@extends('admin.layouts.app')

@section('title', 'سطل زباله پیام‌ها')
@section('page-title', 'سطل زباله پیام‌ها')
@section('page-subtitle', 'پیام‌های حذف‌شده قابل بازیابی یا حذف دائمی هستند')

@section('content')
    <div class="card">
        <div class="card-h">
            <b>پیام‌های حذف‌شده</b>
            <a class="btn sm" href="{{ route('admin.messages.index') }}">بازگشت به پیام‌ها</a>
        </div>

        <div class="card-b">
            <table class="table">
                <thead>
                    <tr>
                        <th>فرستنده</th>
                        <th>موضوع</th>
                        <th>تاریخ حذف</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($messages as $message)
                        <tr>
                            <td>
                                <b>{{ $message->name }}</b>
                                <div style="color:#9aa3b9;font-size:13px">{{ $message->email }}</div>
                            </td>
                            <td>{{ $message->subject ?: \Illuminate\Support\Str::limit($message->body, 60) }}</td>
                            <td style="white-space:nowrap">{{ $message->deleted_at?->format('Y-m-d H:i') }}</td>
                            <td>
                                <div style="display:flex;gap:6px;flex-wrap:wrap">
                                    <form method="POST" action="{{ route('admin.messages.restore', $message->id) }}">
                                        @csrf
                                        <button class="btn sm" type="submit">بازیابی</button>
                                    </form>
                                    <form method="POST" action="{{ route('admin.messages.forceDelete', $message->id) }}"
                                          data-confirm-delete="این پیام برای همیشه حذف شود؟">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn sm dn" type="submit">حذف دائمی</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4"><div class="empty">سطل زباله خالی است.</div></td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($messages->hasPages())
            <div class="pag">{{ $messages->links() }}</div>
        @endif
    </div>
@endsection