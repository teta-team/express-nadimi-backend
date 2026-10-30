@extends('admin.layouts.app')

@section('title', 'پیام‌های تماس')
@section('page-title', 'پیام‌های تماس')
@section('page-subtitle', 'پیام‌های ارسال‌شده از فرم تماس با ما')

@section('content')
    <div class="card">
        <div class="card-h">
            <div>
                <b>پیام‌ها</b>
                @if($newCount > 0)
                    <span class="badge new" style="margin-inline-start:8px">{{ $newCount }} جدید</span>
                @endif
            </div>
            <div class="head-actions">
                <a class="btn sm" href="{{ route('admin.messages.index', ['archived' => $archived ? 0 : 1]) }}">
                    {{ $archived ? 'نمایش فعال' : 'بایگانی' }}
                </a>
                <a class="btn sm" href="{{ route('admin.messages.trash') }}">سطل زباله</a>
            </div>
        </div>

        <form class="filters" method="GET" action="{{ route('admin.messages.index') }}">
            <input type="search" name="search" value="{{ $search }}" placeholder="جستجو در نام، ایمیل، موضوع…">
            <select name="status">
                <option value="">همه وضعیت‌ها</option>
                @foreach(['new' => 'جدید', 'in_progress' => 'در حال بررسی', 'follow_up' => 'پیگیری', 'closed' => 'بسته‌شده'] as $value => $label)
                    <option value="{{ $value }}" @selected($status === $value)>{{ $label }}</option>
                @endforeach
            </select>
            @if($archived)
                <input type="hidden" name="archived" value="1">
            @endif
            <button class="btn p sm" type="submit">فیلتر</button>
            @if($search !== '' || $status)
                <a class="btn sm" href="{{ route('admin.messages.index') }}">پاک‌کردن</a>
            @endif
        </form>

        <div class="card-b">
            <table class="table">
                <thead>
                    <tr>
                        <th>فرستنده</th>
                        <th>نوع</th>
                        <th>موضوع</th>
                        <th>وضعیت</th>
                        <th>تاریخ</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($messages as $message)
                        <tr>
                            <td>
                                <b>{{ $message->name }}</b>
                                <div style="color:#9aa3b9;font-size:13px;margin-top:4px">{{ $message->email }}</div>
                                <div style="color:#9aa3b9;font-size:13px">{{ $message->phone }}</div>
                            </td>
                            <td>
                                @php
                                    $typeLabels = ['message' => 'پیام', 'suggestion' => 'پیشنهاد', 'complaint' => 'شکایت'];
                                @endphp
                                {{ $typeLabels[$message->type] ?? $message->type }}
                            </td>
                            <td style="max-width:260px">{{ $message->subject ?: \Illuminate\Support\Str::limit($message->body, 60) }}</td>
                            <td>
                                @php
                                    $statusLabels = ['new' => 'جدید', 'in_progress' => 'در حال بررسی', 'follow_up' => 'پیگیری', 'closed' => 'بسته‌شده'];
                                    $statusClass = match($message->status) {
                                        'new' => 'new',
                                        'in_progress', 'follow_up' => 'mid',
                                        default => 'done',
                                    };
                                @endphp
                                <span class="badge {{ $statusClass }}">{{ $statusLabels[$message->status] ?? $message->status }}</span>
                            </td>
                            <td style="white-space:nowrap">{{ $message->created_at?->format('Y-m-d H:i') }}</td>
                            <td>
                                <div style="display:flex;gap:6px;flex-wrap:wrap">
                                    <a class="btn sm" href="{{ route('admin.messages.show', $message->id) }}">مشاهده</a>
                                    @if($message->is_new)
                                        <form method="POST" action="{{ route('admin.messages.review', $message->id) }}">
                                            @csrf
                                            <button class="btn sm" type="submit">بررسی شد</button>
                                        </form>
                                    @endif
                                    @if($archived)
                                        <form method="POST" action="{{ route('admin.messages.unarchive', $message->id) }}">
                                            @csrf
                                            <button class="btn sm" type="submit">خروج از بایگانی</button>
                                        </form>
                                    @else
                                        <form method="POST" action="{{ route('admin.messages.archive', $message->id) }}">
                                            @csrf
                                            <button class="btn sm" type="submit">بایگانی</button>
                                        </form>
                                    @endif
                                    <form method="POST" action="{{ route('admin.messages.destroy', $message->id) }}"
                                          data-confirm-delete="این پیام به سطل زباله منتقل شود؟">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn sm dn" type="submit">حذف</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6"><div class="empty">پیامی برای نمایش وجود ندارد.</div></td>
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