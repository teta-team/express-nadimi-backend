<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Services\WhatsAppNotifier;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ContactController extends Controller
{
    public function index($lang)
    {
        return match ($lang) {
            'ar' => view('ar.contact'),
            'fa' => view('fa.contact'),
            default => view('en.contact'),
        };
    }

    public function form(Request $request)
    {
        $request->merge([
            'name' => trim((string) $request->input('name')),
            'subject' => trim((string) $request->input('subject')),
            'email' => strtolower(trim((string) $request->input('email'))),
            'phone' => trim((string) $request->input('phone')),
            'order_ref' => trim((string) $request->input('order_ref')),
            'body' => trim((string) $request->input('body')),
        ]);

        foreach (['subject', 'order_ref'] as $field) {
            if ($request->input($field) === '') {
                $request->merge([$field => null]);
            }
        }

        $validated = $request->validate([
            'type' => ['required', 'in:message,suggestion,complaint'],
            'office' => ['required', 'in:any,ir,om'],
            'name' => ['required', 'string', 'max:120'],
            'subject' => ['nullable', 'string', 'max:190'],
            'email' => ['required', 'email', 'max:190'],
            'phone' => ['required', 'string', 'max:40'],
            'order_ref' => ['nullable', 'string', 'max:80'],
            'body' => ['required', 'string', 'max:4000'],
        ]);

        ContactMessage::create($validated);

        app(WhatsAppNotifier::class)->notify(sprintf(
            "پیام تماس جدید\nنوع: %s\nنام: %s\nموضوع: %s\nایمیل: %s\nتلفن: %s\n\n%s",
            $validated['type'],
            $validated['name'],
            $validated['subject'] ?? '-',
            $validated['email'],
            $validated['phone'],
            Str::limit($validated['body'], 300),
        ));

        $message = match (app()->getLocale()) {
            'en' => 'Your message has been sent successfully.',
            'ar' => 'تم إرسال رسالتك بنجاح.',
            default => 'پیام شما با موفقیت ارسال شد.',
        };

        return redirect()
            ->route('contact', ['lang' => app()->getLocale()])
            ->with('success', $message);
    }
}
