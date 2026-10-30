<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class SettingsController extends Controller
{
    public function edit(Request $request)
    {
        return view('admin.settings.index', [
            'user' => $request->user(),
        ]);
    }

    public function update(Request $request)
    {
        $user = $request->user();

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => [
                'required', 'string', 'min:3', 'max:50',
                'regex:/^[A-Za-z0-9_.-]+$/',
                Rule::unique('users', 'username')->ignore($user->id),
            ],
            'current_password' => ['required', 'string'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ], [
            'name.required' => 'نام را وارد کنید.',
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

        $user->name = $data['name'];
        $user->username = $data['username'];

        if (! empty($data['password'])) {
            $user->password = $data['password'];
        }

        $user->save();

        return back()->with('success', 'اطلاعات حساب با موفقیت به‌روزرسانی شد.');
    }
}
