<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class PanelController extends Controller
{
    /** Default credentials created by the migration. */
    private const DEFAULT_PASSWORD = 'admin';

    /**
     * GET /panel: the login form for guests, the panel for the super user.
     */
    public function index(Request $request)
    {
        $user = Auth::user();

        if (! $user || ! $user->is_superuser) {
            return $this->noStore(response()->view('panel.logIn'));
        }

        return redirect()->route('admin.dashboard');
    }

    /**
     * POST /panel: log in.
     */
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ], [
            'username.required' => 'نام کاربری را وارد کنید.',
            'password.required' => 'گذرواژه را وارد کنید.',
        ]);

        // Limit guessing: 5 failed attempts per username + IP, then wait a minute.
        $key = 'panel-login:'.Str::lower($credentials['username']).'|'.$request->ip();

        if (RateLimiter::tooManyAttempts($key, 5)) {
            $seconds = RateLimiter::availableIn($key);

            throw ValidationException::withMessages([
                'username' => "تعداد تلاش‌ها زیاد است. {$seconds} ثانیه‌ی دیگر دوباره امتحان کنید.",
            ]);
        }

        $ok = Auth::attempt([
            'username' => $credentials['username'],
            'password' => $credentials['password'],
            'is_superuser' => true,
        ]);

        if (! $ok) {
            RateLimiter::hit($key, 60);

            throw ValidationException::withMessages([
                'username' => 'نام کاربری یا گذرواژه درست نیست.',
            ]);
        }

        RateLimiter::clear($key);
        $request->session()->regenerate();

        return redirect()->route('admin.dashboard');
    }

    /**
     * POST /panel/logout
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('panel');
    }

    /**
     * POST /panel/account (JSON): change username and/or password.
     */
    public function updateAccount(Request $request): JsonResponse
    {
        $user = $request->user();

        abort_unless($user && $user->is_superuser, 403);

        $data = $request->validate([
            'username' => [
                'required', 'string', 'min:3', 'max:50',
                'regex:/^[A-Za-z0-9_.-]+$/',
                Rule::unique('users', 'username')->ignore($user->id),
            ],
            'current_password' => ['required', 'string'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ], [
            'username.required' => 'نام کاربری را وارد کنید.',
            'username.min' => 'نام کاربری باید حداقل ۳ کاراکتر باشد.',
            'username.max' => 'نام کاربری نباید بیشتر از ۵۰ کاراکتر باشد.',
            'username.regex' => 'نام کاربری فقط می‌تواند شامل حروف انگلیسی، عدد و نمادهای _ . - باشد.',
            'username.unique' => 'این نام کاربری قبلاً استفاده شده است.',
            'current_password.required' => 'گذرواژه‌ی فعلی را وارد کنید.',
            'password.min' => 'گذرواژه‌ی جدید باید حداقل ۸ کاراکتر باشد.',
            'password.confirmed' => 'تکرار گذرواژه‌ی جدید با آن یکسان نیست.',
        ]);

        if (! Hash::check($data['current_password'], $user->password)) {
            throw ValidationException::withMessages([
                'current_password' => 'گذرواژه‌ی فعلی درست نیست.',
            ]);
        }

        $user->username = $data['username'];

        if (! empty($data['password'])) {
            $user->password = $data['password']; // hashed by the model cast
        }

        $user->save();

        return response()->json([
            'ok' => true,
            'username' => $user->username,
            'weak' => Hash::check(self::DEFAULT_PASSWORD, $user->password),
        ]);
    }

    /**
     * Stop the browser from showing a cached panel after logout (back button).
     */
    private function noStore(Response $response): Response
    {
        return $response->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
    }
}
