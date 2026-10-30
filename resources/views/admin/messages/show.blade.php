@extends('admin.layouts.app')

@section('title', 'جزئیات پیام')
@section('page-title', 'جزئیات پیام')
@section('page-subtitle', 'پیام ارسال‌شده از فرم تماس')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/admin-detail.css') }}">
    <style>
        .rd-badge.is-alert{color:#f87171;border-color:rgba(248,113,113,.3);background:rgba(239,68,68,.12)}
        .rd-hero-icon.is-alert{border-color:rgba(248,113,113,.4);background:rgba(239,68,68,.12);color:#f87171}
        .rd-hero-icon.is-suggestion{border-color:rgba(74,222,128,.35);background:rgba(34,197,94,.14);color:#4ade80}
        .rd-hero-subject{margin-top:7px;font-size:13px;font-weight:600;color:var(--rd-sub);overflow-wrap:anywhere}
        .rd-body{position:relative;padding:26px 22px 20px;border:1px solid rgba(148,163,184,.14);border-radius:12px;background:rgba(148,163,184,.04);font-size:14px;line-height:2.2;white-space:pre-wrap;overflow-wrap:anywhere}
        .rd-body::before{content:"\201D";position:absolute;top:2px;right:16px;font-family:Georgia,serif;font-size:52px;line-height:1;color:rgba(34,197,94,.28);pointer-events:none}
        .rd-body.is-empty::before{display:none}
    </style>
@endpush

@section('content')
    @php
        $type = $message->type ?: 'message';

        $typeLabels = [
            'message' => 'پیام',
            'suggestion' => 'پیشنهاد',
            'complaint' => 'شکایت',
        ];
        $typeClasses = [
            'message' => 'is-new',
            'suggestion' => 'is-closed',
            'complaint' => 'is-alert',
        ];

        $officeLabels = [
            'any' => 'هر دو دفتر',
            'ir' => 'دفتر ایران',
            'om' => 'دفتر عمان',
        ];

        $statusLabels = [
            'new' => 'جدید',
            'in_progress' => 'در حال بررسی',
            'follow_up' => 'پیگیری',
            'closed' => 'بسته‌شده',
        ];
        $statusClasses = [
            'new' => 'is-new',
            'in_progress' => 'is-progress',
            'follow_up' => 'is-follow',
            'closed' => 'is-closed',
        ];

        $status = $message->status ?: 'new';
        $isReviewed = ! $message->is_new;
        $isArchived = (bool) $message->archived_at;

        $hasValue = fn ($value) => ! is_null($value) && $value !== '' && $value !== [];
    @endphp

    <div class="rd">
        @if(session('success'))
            <div class="rd-alert">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <section class="rd-hero">
            <div class="rd-hero-main">
                <div class="rd-hero-icon {{ $type === 'complaint' ? 'is-alert' : ($type === 'suggestion' ? 'is-suggestion' : '') }}">
                    @if($type === 'complaint')
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M10.29 3.86 1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><path d="M12 9v4M12 17h.01"/></svg>
                    @elseif($type === 'suggestion')
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18h6M10 22h4"/><path d="M12 2a7 7 0 0 0-4 12.7c.6.5 1 1.2 1 2V18h6v-1.3c0-.8.4-1.5 1-2A7 7 0 0 0 12 2z"/></svg>
                    @else
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/><path d="M8 10h8M8 14h5"/></svg>
                    @endif
                </div>

                <div style="min-width:0">
                    <div class="rd-hero-eyebrow">
                        <span>{{ $typeLabels[$type] ?? $type }}</span>
                        <span class="rd-id">#{{ $message->id }}</span>
                    </div>

                    <h2 class="rd-hero-name">{{ $message->name }}</h2>

                    @if($hasValue($message->subject))
                        <div class="rd-hero-subject">{{ $message->subject }}</div>
                    @endif

                    <div class="rd-hero-meta">
                        <span class="rd-badge {{ $typeClasses[$type] ?? 'is-new' }}">
                            <span class="rd-dot"></span>
                            {{ $typeLabels[$type] ?? $type }}
                        </span>

                        <span class="rd-badge {{ $statusClasses[$status] ?? 'is-new' }}">
                            {{ $statusLabels[$status] ?? $status }}
                        </span>

                        <span class="rd-badge {{ $isReviewed ? 'is-reviewed' : 'is-pending' }}">
                            {{ $isReviewed ? 'بررسی‌شده' : 'بررسی‌نشده' }}
                        </span>

                        @if($isArchived)
                            <span class="rd-badge is-archived">بایگانی‌شده</span>
                        @endif

                        <span>ثبت‌شده در {{ $message->created_at?->format('Y/m/d - H:i') ?? '—' }}</span>
                    </div>
                </div>
            </div>

            <div class="rd-hero-actions">
                <button type="button" class="btn" onclick="window.print()">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9V2h12v7"/><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><path d="M6 14h12v8H6z"/></svg>
                    چاپ
                </button>
                <a class="btn" href="{{ route('admin.messages.index') }}">بازگشت به فهرست</a>
            </div>
        </section>

        <div class="rd-grid">
            <div class="rd-main">
                <section class="rd-card">
                    <header class="rd-card-h">
                        <h3>
                            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                            اطلاعات فرستنده
                        </h3>
                    </header>

                    <div class="rd-card-b">
                        <div class="rd-fields">
                            <div class="rd-field">
                                <span class="rd-label">ایمیل</span>
                                <div class="rd-value">
                                    @if($hasValue($message->email))
                                        <a href="mailto:{{ $message->email }}" dir="ltr">{{ $message->email }}</a>
                                        <button type="button" class="rd-copy" data-copy="{{ $message->email }}" aria-label="کپی ایمیل" title="کپی ایمیل">
                                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>
                                        </button>
                                    @else
                                        <span class="rd-muted">ثبت نشده</span>
                                    @endif
                                </div>
                            </div>

                            <div class="rd-field">
                                <span class="rd-label">تلفن / واتساپ</span>
                                <div class="rd-value">
                                    @if($hasValue($message->phone))
                                        <a href="tel:{{ preg_replace('/\s+/', '', $message->phone) }}" dir="ltr">{{ $message->phone }}</a>
                                        <button type="button" class="rd-copy" data-copy="{{ $message->phone }}" aria-label="کپی شماره" title="کپی شماره">
                                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>
                                        </button>
                                        <a href="https://wa.me/{{ preg_replace('/\D+/', '', $message->phone) }}" target="_blank" rel="noopener" title="باز کردن در واتساپ">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/></svg>
                                        </a>
                                    @else
                                        <span class="rd-muted">ثبت نشده</span>
                                    @endif
                                </div>
                            </div>

                            <div class="rd-field">
                                <span class="rd-label">ارسال به</span>
                                <div class="rd-value">
                                    <span class="rd-chip">{{ $officeLabels[$message->office] ?? ($message->office ?: '—') }}</span>
                                </div>
                            </div>

                            <div class="rd-field">
                                <span class="rd-label">شماره سفارش</span>
                                <div class="rd-value">
                                    @if($hasValue($message->order_ref))
                                        <span dir="ltr">{{ $message->order_ref }}</span>
                                    @else
                                        <span class="rd-muted">ثبت نشده</span>
                                    @endif
                                </div>
                            </div>

                            <div class="rd-field is-wide">
                                <span class="rd-label">موضوع</span>
                                <div class="rd-value">
                                    @if($hasValue($message->subject))
                                        {{ $message->subject }}
                                    @else
                                        <span class="rd-muted">بدون موضوع</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="rd-card">
                    <header class="rd-card-h">
                        <h3>
                            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                            متن پیام
                        </h3>
                    </header>

                    <div class="rd-card-b">
                        <div class="rd-body {{ $hasValue($message->body) ? '' : 'is-empty' }}">
                            {{ $hasValue($message->body) ? $message->body : 'متن پیامی ثبت نشده است.' }}
                        </div>
                    </div>
                </section>
            </div>

            <aside class="rd-side">
                <section class="rd-card">
                    <header class="rd-card-h">
                        <h3>
                            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4z"/></svg>
                            مدیریت پیام
                        </h3>
                    </header>

                    <div class="rd-card-b">
                        <div class="rd-status-row">
                            <span class="rd-label" style="margin:0">وضعیت فعلی</span>
                            <span class="rd-badge {{ $statusClasses[$status] ?? 'is-new' }}">
                                <span class="rd-dot"></span>
                                {{ $statusLabels[$status] ?? $status }}
                            </span>
                        </div>

                        <form class="rd-status-form" method="POST" action="{{ route('admin.messages.updateStatus', $message->id) }}">
                            @csrf
                            @method('PATCH')

                            <label class="rd-label" for="message-status">تغییر وضعیت</label>
                            <div class="rd-select-row">
                                <select class="rd-select" id="message-status" name="status" aria-label="وضعیت پیام">
                                    @foreach($statusLabels as $key => $label)
                                        <option value="{{ $key }}" @selected($status === $key)>{{ $label }}</option>
                                    @endforeach
                                </select>
                                <button class="btn p" type="submit">ذخیره</button>
                            </div>
                        </form>

                        <div class="rd-actions">
                            @if(! $isReviewed)
                                <form method="POST" action="{{ route('admin.messages.review', $message->id) }}">
                                    @csrf
                                    <button class="btn p" type="submit">
                                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>
                                        علامت‌گذاری به‌عنوان بررسی‌شده
                                    </button>
                                </form>
                            @else
                                <p class="rd-hint" style="margin:0">این پیام در {{ $message->reviewed_at->format('Y/m/d - H:i') }} بررسی شده است.</p>
                            @endif

                            @if($isArchived)
                                <form method="POST" action="{{ route('admin.messages.unarchive', $message->id) }}">
                                    @csrf
                                    <button class="btn" type="submit">خروج از بایگانی</button>
                                </form>
                            @else
                                <form method="POST" action="{{ route('admin.messages.archive', $message->id) }}">
                                    @csrf
                                    <button class="btn" type="submit">بایگانی پیام</button>
                                </form>
                            @endif
                        </div>

                        <p class="rd-hint">
                            بازکردن این صفحه وضعیت بررسی را تغییر نمی‌دهد. برای ثبت بررسی، دکمهٔ مربوطه را بزن.
                        </p>
                    </div>
                </section>

                <section class="rd-card">
                    <header class="rd-card-h">
                        <h3>
                            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
                            گردش کار
                        </h3>
                    </header>

                    <div class="rd-card-b">
                        <div class="rd-timeline">
                            <div class="rd-timeline-item is-done">
                                <span class="rd-timeline-dot"></span>
                                <div>
                                    <div class="rd-timeline-label">دریافت پیام</div>
                                    <div class="rd-timeline-time">{{ $message->created_at?->format('Y/m/d - H:i') ?? '—' }}</div>
                                </div>
                            </div>

                            <div class="rd-timeline-item {{ $isReviewed ? 'is-done' : '' }}">
                                <span class="rd-timeline-dot"></span>
                                <div>
                                    <div class="rd-timeline-label">{{ $isReviewed ? 'بررسی شد' : 'در انتظار بررسی' }}</div>
                                    <div class="rd-timeline-time">
                                        {{ $isReviewed ? $message->reviewed_at->format('Y/m/d - H:i') : 'هنوز بررسی نشده است' }}
                                    </div>
                                </div>
                            </div>

                            <div class="rd-timeline-item {{ $isArchived ? 'is-done' : '' }}">
                                <span class="rd-timeline-dot"></span>
                                <div>
                                    <div class="rd-timeline-label">{{ $isArchived ? 'بایگانی شد' : 'در جریان' }}</div>
                                    <div class="rd-timeline-time">
                                        {{ $isArchived ? $message->archived_at->format('Y/m/d - H:i') : 'در فهرست فعال پیام‌ها' }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="rd-card rd-danger">
                    <header class="rd-card-h">
                        <h3>
                            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/><path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><path d="M10 11v6M14 11v6"/></svg>
                            حذف پیام
                        </h3>
                    </header>

                    <div class="rd-card-b">
                        <p class="rd-danger-text">
                            این پیام به سطل زباله منتقل می‌شود و از فهرست اصلی حذف خواهد شد. در صورت نیاز می‌توانید آن را بازیابی کنید.
                        </p>

                        <form method="POST"
                              action="{{ route('admin.messages.destroy', $message->id) }}"
                              data-confirm-delete="این پیام به سطل زباله منتقل شود؟">
                            @csrf
                            @method('DELETE')
                            <button class="btn dn rd-wide" type="submit">انتقال به زباله‌دان</button>
                        </form>
                    </div>
                </section>
            </aside>
        </div>
    </div>

    <div class="rd-toast" id="rdToast" role="status" aria-live="polite">کپی شد</div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/admin-detail.js') }}" defer></script>
@endpush
