@extends('admin.layouts.app')

@section('title', 'جزئیات درخواست')
@section('page-title', 'جزئیات درخواست')
@section('page-subtitle', 'مشاهده و مدیریت درخواست ثبت‌شده')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/admin-detail.min.css') }}">
@endpush

@section('content')
    @php
        $isPrice = $type === 'price';

        $statusLabels = [
            'new' => 'جدید',
            'in_progress' => 'در حال پیگیری',
            'follow_up' => 'نیازمند پیگیری',
            'closed' => 'بسته‌شده',
        ];
        $statusClasses = [
            'new' => 'is-new',
            'in_progress' => 'is-progress',
            'follow_up' => 'is-follow',
            'closed' => 'is-closed',
        ];

        $title = $isPrice ? 'استعلام قیمت' : 'درخواست همکاری تأمین‌کننده';
        $status = $item->status ?: 'new';
        $isReviewed = (bool) $item->reviewed_at;
        $isArchived = (bool) $item->archived_at;

        $optionLabels = [
            'role' => [
                'farmer' => 'کشاورز',
                'orchard' => 'باغدار',
                'greenhouse' => 'گلخانه‌دار',
                'producer' => 'تولیدکننده',
                'cold_storage' => 'سردخانه‌دار',
                'wholesaler' => 'تأمین‌کننده / عمده‌فروش',
                'company' => 'شرکت یا مجموعه کشاورزی',
                'other' => 'سایر',
            ],
            'frequency' => [
                'single' => 'یک محموله',
                'daily' => 'روزانه',
                'weekly' => 'هفتگی',
                'monthly' => 'ماهانه',
                'season' => 'کل فصل برداشت',
            ],
            'state' => [
                'fresh' => 'تازه برداشت‌شده',
                'on_tree' => 'روی درخت / مزرعه',
                'ready_harvest' => 'آماده برداشت',
                'cold_storage' => 'در سردخانه',
                'ready_load' => 'آماده بارگیری',
            ],
            'sorted' => [
                'yes' => 'بله',
                'no' => 'خیر',
                'possible' => 'امکان سورت وجود دارد',
            ],
            'visit' => ['yes' => 'بله', 'no' => 'خیر'],
            'export_history' => ['yes' => 'بله', 'no' => 'خیر'],
            'long_term' => [
                'yes' => 'بله',
                'no' => 'خیر',
                'seasonal' => 'بستگی به فصل محصول دارد',
            ],
            'price_terms' => [
                'farm' => 'تحویل در محل تولید',
                'cold_storage' => 'تحویل سردخانه',
                'agreed' => 'تحویل محل مورد توافق',
                'negotiable' => 'قابل مذاکره',
            ],
        ];

        $packagingLabels = [
            'carton_5' => 'کارتن ۵ کیلویی',
            'carton_10' => 'کارتن ۱۰ کیلویی',
            'tray' => 'سینی',
            'crate' => 'جعبه / کرات',
            'mesh_bag' => 'کیسه توری',
            'bulk' => 'فله',
            'punnet' => 'پانت',
            'private_label' => 'برند اختصاصی',
        ];

        $hasValue = fn ($value) => ! is_null($value) && $value !== '' && $value !== [];

        $formatNumber = function ($value, int $decimals = 2) {
            $formatted = number_format((float) $value, $decimals, '.', ',');

            return rtrim(rtrim($formatted, '0'), '.');
        };

        $formatValue = function ($value, string $field = '') use ($optionLabels, $formatNumber, $packagingLabels) {
            if (! is_null($value) && $value !== '' && isset($optionLabels[$field]) && is_scalar($value)) {
                return $optionLabels[$field][(string) $value] ?? (string) $value;
            }

            if (is_null($value) || $value === '') {
                return '—';
            }

            if (is_bool($value)) {
                return $value ? 'بله' : 'خیر';
            }

            if ($value instanceof \DateTimeInterface) {
                return $value->format('Y/m/d');
            }

            if (is_array($value)) {
                return implode('، ', array_map(
                    fn ($entry) => is_scalar($entry)
                        ? (string) $entry
                        : json_encode($entry, JSON_UNESCAPED_UNICODE),
                    $value
                ));
            }

            return match ($field) {
                'quantity_tons' => $formatNumber($value).' تن',
                'pack_weight' => $formatNumber($value).' کیلوگرم',
                'price' => $formatNumber($value).' تومان',
                'years' => $formatNumber($value, 0).' سال',
                'packaging' => $packagingLabels[(string) $value] ?? (string) $value,
                default => (string) $value,
            };
        };

        $supplierGroups = [
            [
                'title' => 'مشخصات تأمین‌کننده',
                'fields' => [
                    'mobile' => 'شماره موبایل',
                    'whatsapp' => 'واتساپ',
                    'city' => 'شهر',
                    'province' => 'استان',
                    'role' => 'نقش / نوع همکاری',
                ],
            ],
            [
                'title' => 'مشخصات محصول',
                'fields' => [
                    'product' => 'محصول',
                    'variety' => 'رقم محصول',
                    'origin' => 'مبدأ محصول',
                    'quantity_tons' => 'مقدار (تن)',
                    'grade' => 'درجه کیفی',
                    'size' => 'سایز',
                    'state' => 'وضعیت محصول',
                    'sorted' => 'سورت‌شده',
                    'capacity' => 'ظرفیت تأمین',
                    'frequency' => 'تناوب تأمین',
                    'ready_from' => 'آماده از تاریخ',
                    'ready_until' => 'آماده تا تاریخ',
                ],
            ],
            [
                'title' => 'بسته‌بندی و قیمت',
                'fields' => [
                    'packing' => 'نوع بسته‌بندی',
                    'pack_weight' => 'وزن بسته',
                    'change_pack' => 'امکان تغییر بسته‌بندی',
                    'custom_pack' => 'بسته‌بندی سفارشی',
                    'price' => 'قیمت اعلام‌شده',
                    'price_terms' => 'شرایط قیمت',
                    'payment_terms' => 'شرایط پرداخت',
                ],
            ],
            [
                'title' => 'سابقه و همکاری',
                'fields' => [
                    'years' => 'سال‌های فعالیت',
                    'export_history' => 'سابقه صادرات',
                    'export_markets' => 'بازارهای صادراتی',
                    'long_term' => 'همکاری بلندمدت',
                    'visit' => 'امکان بازدید',
                ],
            ],
        ];

        $mediaUrl = fn (string $path) => str_starts_with($path, 'http')
            ? $path
            : asset('storage/'.ltrim($path, '/'));
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
                <div class="rd-hero-icon {{ $isPrice ? '' : 'is-supplier' }}">
                    @if($isPrice)
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6"/><path d="M8 13h8M8 17h5"/></svg>
                    @else
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><path d="M9 22V12h6v10"/></svg>
                    @endif
                </div>

                <div style="min-width:0">
                    <div class="rd-hero-eyebrow">
                        <span>{{ $title }}</span>
                        <span class="rd-id">#{{ $item->id }}</span>
                    </div>

                    <h2 class="rd-hero-name">{{ $item->name ?: 'بدون نام' }}</h2>

                    <div class="rd-hero-meta">
                        <span class="rd-badge {{ $statusClasses[$status] ?? 'is-new' }}">
                            <span class="rd-dot"></span>
                            {{ $statusLabels[$status] ?? $status }}
                        </span>

                        <span class="rd-badge {{ $isReviewed ? 'is-reviewed' : 'is-pending' }}">
                            {{ $isReviewed ? 'بررسی‌شده' : 'بررسی‌نشده' }}
                        </span>

                        @if($isArchived)
                            <span class="rd-badge is-archived">بایگانی‌شده</span>
                        @endif

                        <span>ثبت‌شده در {{ $item->created_at?->format('Y/m/d - H:i') ?? '—' }}</span>
                    </div>
                </div>
            </div>

            <div class="rd-hero-actions">
                <button type="button" class="btn" onclick="window.print()">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9V2h12v7"/><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><path d="M6 14h12v8H6z"/></svg>
                    چاپ
                </button>
                <a class="btn" href="{{ route('admin.Request') }}">بازگشت به فهرست</a>
            </div>
        </section>

        <div class="rd-grid">
            <div class="rd-main">
                @if($isPrice)
                    <section class="rd-card">
                        <header class="rd-card-h">
                            <h3>
                                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                اطلاعات تماس
                            </h3>
                        </header>

                        <div class="rd-card-b">
                            <div class="rd-fields">
                                @foreach([
                                    'company' => 'شرکت',
                                    'destination' => 'مقصد',
                                    'incoterm' => 'شرایط تحویل',
                                ] as $field => $label)
                                    @php $value = $item->{$field}; @endphp
                                    <div class="rd-field">
                                        <span class="rd-label">{{ $label }}</span>
                                        <div class="rd-value">
                                            @if($hasValue($value))
                                                {{ $formatValue($value, $field) }}
                                            @else
                                                <span class="rd-muted">ثبت نشده</span>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach

                                <div class="rd-field">
                                    <span class="rd-label">ایمیل</span>
                                    <div class="rd-value">
                                        @if($hasValue($item->email))
                                            <a href="mailto:{{ $item->email }}" dir="ltr">{{ $item->email }}</a>
                                            <button type="button" class="rd-copy" data-copy="{{ $item->email }}" aria-label="کپی ایمیل" title="کپی ایمیل">
                                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>
                                            </button>
                                        @else
                                            <span class="rd-muted">ثبت نشده</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="rd-field">
                                    <span class="rd-label">شماره تماس</span>
                                    <div class="rd-value">
                                        @if($hasValue($item->phone))
                                            <a href="tel:{{ preg_replace('/\s+/', '', $item->phone) }}" dir="ltr">{{ $item->phone }}</a>
                                            <button type="button" class="rd-copy" data-copy="{{ $item->phone }}" aria-label="کپی شماره" title="کپی شماره">
                                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>
                                            </button>
                                        @else
                                            <span class="rd-muted">ثبت نشده</span>
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
                                پیام درخواست
                            </h3>
                        </header>

                        <div class="rd-card-b">
                            <div class="rd-message {{ $hasValue($item->message) ? '' : 'is-empty' }}">
                                {{ $hasValue($item->message) ? $item->message : 'پیامی برای این استعلام ثبت نشده است.' }}
                            </div>
                        </div>
                    </section>

                    <section class="rd-card">
                        <header class="rd-card-h">
                            <h3>
                                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/><path d="m3.3 7 8.7 5 8.7-5"/><path d="M12 22V12"/></svg>
                                محصولات درخواستی
                            </h3>
                            <span class="rd-count">{{ $item->items->count() }}</span>
                        </header>

                        @if($item->items->isEmpty())
                            <div class="rd-empty">
                                <svg width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/><path d="m3.3 7 8.7 5 8.7-5"/><path d="M12 22V12"/></svg>
                                محصولی به این استعلام متصل نشده است.
                            </div>
                        @else
                            <div class="rd-table-wrap">
                                <table class="rd-table">
                                    <thead>
                                    <tr>
                                        <th>محصول</th>
                                        <th>مقدار</th>
                                        <th>بسته‌بندی</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($item->items as $requestItem)
                                        @php
                                            $productName = $requestItem->product?->name;
                                            if (is_array($productName)) {
                                                $productName = $productName['fa'] ?? $productName['en'] ?? null;
                                            }
                                            $productName = $productName ?: 'محصول حذف‌شده';
                                            $productImage = $requestItem->product?->image;
                                        @endphp
                                        <tr>
                                            <td>
                                                <div class="rd-product">
                                                    <span class="rd-product-img">
                                                        @if($productImage)
                                                            <img src="{{ $productImage }}" alt="{{ $productName }}" loading="lazy">
                                                        @else
                                                            {{ mb_substr($productName, 0, 1) }}
                                                        @endif
                                                    </span>
                                                    <span>
                                                        <span class="rd-product-name">{{ $productName }}</span>
                                                        @if($requestItem->product?->slug)
                                                            <span class="rd-product-sub" dir="ltr">{{ $requestItem->product->slug }}</span>
                                                        @endif
                                                    </span>
                                                </div>
                                            </td>
                                            <td><span class="rd-qty">{{ $requestItem->quantity ?: '—' }}</span></td>
                                            <td>
                                                @if($requestItem->packaging)
                                                    <span class="rd-chip">{{ $packagingLabels[$requestItem->packaging] ?? $requestItem->packaging }}</span>
                                                @else
                                                    <span class="rd-muted">—</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </section>
                @else
                    @foreach($supplierGroups as $group)
                        @php
                            $visibleFields = array_filter(
                                $group['fields'],
                                fn ($label, $field) => $hasValue($item->{$field}),
                                ARRAY_FILTER_USE_BOTH
                            );
                        @endphp

                        @if(!empty($visibleFields))
                            <section class="rd-card">
                                <header class="rd-card-h">
                                    <h3>
                                        <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
                                        {{ $group['title'] }}
                                    </h3>
                                </header>

                                <div class="rd-card-b">
                                    <div class="rd-fields">
                                        @foreach($visibleFields as $field => $label)
                                            @php $value = $item->{$field}; @endphp
                                            <div class="rd-field">
                                                <span class="rd-label">{{ $label }}</span>
                                                <div class="rd-value">
                                                    @if(in_array($field, ['mobile', 'whatsapp'], true) && $hasValue($value))
                                                        <a href="tel:{{ preg_replace('/\s+/', '', $value) }}" dir="ltr">{{ $value }}</a>
                                                        <button type="button" class="rd-copy" data-copy="{{ $value }}" aria-label="کپی {{ $label }}" title="کپی">
                                                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>
                                                        </button>
                                                        @if($field === 'whatsapp')
                                                            <a href="https://wa.me/{{ preg_replace('/\D+/', '', $value) }}" target="_blank" rel="noopener" title="باز کردن در واتساپ">
                                                                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/></svg>
                                                            </a>
                                                        @endif
                                                    @else
                                                        {{ $formatValue($value, $field) }}
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </section>
                        @endif
                    @endforeach

                    @if($hasValue($item->notes))
                        <section class="rd-card">
                            <header class="rd-card-h">
                                <h3>
                                    <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6"/><path d="M8 13h8M8 17h5"/></svg>
                                    توضیحات تکمیلی
                                </h3>
                            </header>
                            <div class="rd-card-b">
                                <div class="rd-message">{{ $item->notes }}</div>
                            </div>
                        </section>
                    @endif

                    @if($hasValue($item->photos) || $hasValue($item->packaging_photos) || $hasValue($item->video))
                        <section class="rd-card">
                            <header class="rd-card-h">
                                <h3>
                                    <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="m21 15-5-5L5 21"/></svg>
                                    رسانه‌های ارسالی
                                </h3>
                            </header>

                            <div class="rd-card-b">
                                @foreach([
                                    'photos' => 'تصاویر محصول',
                                    'packaging_photos' => 'تصاویر بسته‌بندی',
                                ] as $field => $label)
                                    @php $files = $item->{$field}; @endphp
                                    @if(is_array($files) && $hasValue($files))
                                        <div class="rd-media-block">
                                            <div class="rd-media-title">{{ $label }} <span>{{ count($files) }}</span></div>
                                            <div class="rd-media-grid">
                                                @foreach($files as $file)
                                                    @if(is_string($file) && $file !== '')
                                                        <a class="rd-thumb" href="{{ $mediaUrl($file) }}" target="_blank" rel="noopener">
                                                            <img src="{{ $mediaUrl($file) }}" alt="{{ $label }}" loading="lazy">
                                                        </a>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                                @if($hasValue($item->video) && is_string($item->video))
                                    <div class="rd-media-block">
                                        <div class="rd-media-title">ویدئو</div>
                                        <a class="rd-video" href="{{ $mediaUrl($item->video) }}" target="_blank" rel="noopener">
                                            <span class="rd-video-icon">
                                                <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>
                                            </span>
                                            <span class="rd-video-text">
                                                <strong>پخش ویدئوی ارسالی</strong>
                                                <small>برای مشاهده در تب جدید باز می‌شود</small>
                                            </span>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </section>
                    @endif
                @endif
            </div>

            <aside class="rd-side">
                <section class="rd-card">
                    <header class="rd-card-h">
                        <h3>
                            <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4z"/></svg>
                            مدیریت درخواست
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

                        <form class="rd-status-form" method="POST" action="{{ route('admin.Request.updateStatus', [$type, $item->id]) }}">
                            @csrf
                            @method('PATCH')

                            <label class="rd-label" for="request-status">تغییر وضعیت</label>
                            <div class="rd-select-row">
                                <select class="rd-select" id="request-status" name="status" aria-label="وضعیت درخواست">
                                    @foreach($statusLabels as $key => $label)
                                        <option value="{{ $key }}" @selected($status === $key)>{{ $label }}</option>
                                    @endforeach
                                </select>
                                <button class="btn p" type="submit">ذخیره</button>
                            </div>
                        </form>

                        <div class="rd-actions">
                            @if(! $isReviewed)
                                <form method="POST" action="{{ route('admin.Request.review', [$type, $item->id]) }}">
                                    @csrf
                                    <button class="btn p" type="submit">
                                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>
                                        علامت‌گذاری به‌عنوان بررسی‌شده
                                    </button>
                                </form>
                            @else
                                <p class="rd-hint" style="margin:0">این درخواست در {{ $item->reviewed_at->format('Y/m/d - H:i') }} بررسی شده است.</p>
                            @endif

                            @if($isArchived)
                                <form method="POST" action="{{ route('admin.Request.unarchive', [$type, $item->id]) }}">
                                    @csrf
                                    <button class="btn" type="submit">خروج از بایگانی</button>
                                </form>
                            @else
                                <form method="POST" action="{{ route('admin.Request.archive', [$type, $item->id]) }}">
                                    @csrf
                                    <button class="btn" type="submit">بایگانی درخواست</button>
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
                                    <div class="rd-timeline-label">ثبت درخواست</div>
                                    <div class="rd-timeline-time">{{ $item->created_at?->format('Y/m/d - H:i') ?? '—' }}</div>
                                </div>
                            </div>

                            <div class="rd-timeline-item {{ $isReviewed ? 'is-done' : '' }}">
                                <span class="rd-timeline-dot"></span>
                                <div>
                                    <div class="rd-timeline-label">{{ $isReviewed ? 'بررسی شد' : 'در انتظار بررسی' }}</div>
                                    <div class="rd-timeline-time">
                                        {{ $isReviewed ? $item->reviewed_at->format('Y/m/d - H:i') : 'هنوز بررسی نشده است' }}
                                    </div>
                                </div>
                            </div>

                            <div class="rd-timeline-item {{ $isArchived ? 'is-done' : '' }}">
                                <span class="rd-timeline-dot"></span>
                                <div>
                                    <div class="rd-timeline-label">{{ $isArchived ? 'بایگانی شد' : 'در جریان' }}</div>
                                    <div class="rd-timeline-time">
                                        {{ $isArchived ? $item->archived_at->format('Y/m/d - H:i') : 'در فهرست فعال درخواست‌ها' }}
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
                            حذف درخواست
                        </h3>
                    </header>

                    <div class="rd-card-b">
                        <p class="rd-danger-text">
                            این درخواست به زباله‌دان منتقل می‌شود و از فهرست اصلی حذف خواهد شد. در صورت نیاز می‌توانید آن را بازیابی کنید.
                        </p>

                        <form method="POST"
                              action="{{ route('admin.Request.destroy', [$type, $item->id]) }}"
                              data-confirm-delete="این درخواست به زباله‌دان منتقل شود؟">
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
    <script src="{{ asset('assets/js/admin-detail.min.js') }}" defer></script>
@endpush
