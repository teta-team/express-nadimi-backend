<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ContactMessageController extends Controller
{
    private const STATUSES = ['new', 'in_progress', 'follow_up', 'closed'];

    public function index(Request $request)
    {
        $status = $request->query('status');
        $search = trim((string) $request->query('search', ''));
        $archived = $request->boolean('archived');

        abort_if($status !== null && ! in_array($status, self::STATUSES, true), 404);

        $messages = ContactMessage::query()
            ->when(
                $archived,
                fn ($q) => $q->whereNotNull('archived_at'),
                fn ($q) => $q->whereNull('archived_at')
            )
            ->when($status, fn ($q) => $q->where('status', $status))
            ->when($search !== '', function ($q) use ($search) {
                $q->where(function ($sub) use ($search) {
                    foreach (['name', 'email', 'phone', 'subject', 'body', 'order_ref'] as $column) {
                        $sub->orWhere($column, 'like', "%{$search}%");
                    }
                });
            })
            ->latest()
            ->paginate(15)
            ->withQueryString();

        $newCount = ContactMessage::whereNull('reviewed_at')
            ->whereNull('archived_at')
            ->count();

        return view('admin.messages.index', compact('messages', 'status', 'search', 'archived', 'newCount'));
    }

    public function show(int $id)
    {
        $message = ContactMessage::findOrFail($id);

        return view('admin.messages.show', compact('message'));
    }

    public function review(int $id)
    {
        ContactMessage::findOrFail($id)->forceFill(['reviewed_at' => now()])->save();

        return back()->with('success', 'پیام به‌عنوان بررسی‌شده علامت‌گذاری شد.');
    }

    public function updateStatus(Request $request, int $id)
    {
        $validated = $request->validate([
            'status' => ['required', Rule::in(self::STATUSES)],
        ]);

        ContactMessage::findOrFail($id)->update(['status' => $validated['status']]);

        return back()->with('success', 'وضعیت پیام تغییر کرد.');
    }

    public function archive(int $id)
    {
        ContactMessage::findOrFail($id)->forceFill(['archived_at' => now()])->save();

        return redirect()->route('admin.messages.index')->with('success', 'پیام بایگانی شد.');
    }

    public function unarchive(int $id)
    {
        ContactMessage::findOrFail($id)->forceFill(['archived_at' => null])->save();

        return back()->with('success', 'پیام از بایگانی خارج شد.');
    }

    public function destroy(int $id)
    {
        ContactMessage::findOrFail($id)->delete();

        return back()->with('success', 'پیام به سطل زباله منتقل شد.');
    }

    public function trash()
    {
        $messages = ContactMessage::onlyTrashed()->latest()->paginate(15);

        return view('admin.messages.trash', compact('messages'));
    }

    public function restore(int $id)
    {
        ContactMessage::onlyTrashed()->findOrFail($id)->restore();

        return back()->with('success', 'پیام بازیابی شد.');
    }

    public function forceDelete(int $id)
    {
        ContactMessage::onlyTrashed()->findOrFail($id)->forceDelete();

        return back()->with('success', 'پیام برای همیشه حذف شد.');
    }
}
