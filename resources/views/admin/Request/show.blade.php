@extends('admin.layouts.app')

@section('title', 'جزئیات درخواست')
@section('page-title', 'جزئیات درخواست')
@section('page-subtitle', 'مشاهده و مدیریت درخواست ثبت‌شده')

@section('content')
    <style>
        .request-detail{width:100%;min-width:0;color:var(--text,#e5e0d8)}
        .request-detail-grid{display:grid;grid-template-columns:minmax(0,1.5fr) minmax(260px,1fr);gap:16px}
        .request-detail-section{margin-bottom:16px}
        .request-detail-heading{font-size:14px;font-weight:800;margin-bottom:16px}
        .request-detail-fields{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:16px}
        .request-detail-field{min-width:0;padding-bottom:12px;border-bottom:1px solid var(--border,#39332f)}
        .request-detail-label{font-size:11px;color:var(--sub,#a59b91);margin-bottom:7px}
        .request-detail-value{font-size:13px;line-height:2;overflow-wrap:anywhere;white-space:pre-wrap}
        .request-detail-value a{color:var(--primary,#b78a61);overflow-wrap:anywhere}
        .request-detail-actions{display:flex;flex-wrap:wrap;gap:9px;margin-top:18px}
        .request-detail-form{display:flex;gap:8px;flex-wrap:wrap}
        .request-detail-form select{min-height:39px;padding:8px 10px;border:1px solid var(--border,#39332f);border-radius:9px;background:var(--card,#25211e);color:var(--text,#e5e0d8);font:inherit;font-size:12px}
        .request-detail-alert{padding:12px 14px;margin-bottom:15px;border:1px solid rgba(86,201,149,.25);border-radius:10px;background:rgba(22,121,75,.12);color:#56c995;font-size:13px}
        .request-detail-table{width:100%;border-collapse:collapse}
        .request-detail-table th,.request-detail-table td{padding:12px 8px;border-bottom:1px solid var(--border,#39332f);text-align:right;font-size:12px;line-height:1.8}
        .request-detail-table th{color:var(--sub,#a59b91)}
        .request-detail-table tr:last-child td{border-bottom:0}
        .request-detail-muted{color:var(--sub,#a59b91);font-size:12px;line-height:2}
        @media(max-width:800px){.request-detail-grid{grid-template-columns:1fr}}
        @media(max-width:500px){.request-detail-fields{grid-template-columns:1fr}.request-detail-form select{width:100%}}
    </style>

    @php
        $isPrice = $type === 'price';
        $statusLabels = [
            'new' => 'جدید',
            'in_progress' => 'در حال پیگیری',
            'follow_up' => 'نیازمند پیگیری',
            'closed' => 'بسته‌شده',
        ];
        $title = $isPrice ? 'استعلام قیمت' : 'درخواست همکاری تأمین‌کننده';

        $supplierLabels = [
            'mobile' => 'شماره موبایل',
            'whatsapp' => 'واتساپ',
            'city' => 'شهر',
            'province' => 'استان',
            'role' => 'نقش / نوع همکاری',
            'product' => 'محصول',
            'variety' => 'رقم محصول',
            'origin' => 'مبدأ محصول',
            'grade' => 'درجه کیفی',
            'size' => 'سایز',
            'state' => 'وضعیت محصول',
            'sorted' => 'سورت‌شده',
            'capacity' => 'ظرفیت تأمین',
            'frequency' => 'تناوب تأمین',
            'ready_from' => 'آماده از تاریخ',
            'ready_until' => 'آماده تا تاریخ',
            'packing' => 'نوع بسته‌بندی',
            'pack_weight' => 'وزن بسته',
            'change_pack' => 'امکان تغییر بسته‌بندی',
            'custom_pack' => 'توضیحات بسته‌بندی سفارشی',
            'price' => 'قیمت اعلام‌شده',
            'price_terms' => 'شرایط قیمت',
            'payment_terms' => 'شرایط پرداخت',
            'quantity_tons' => 'مقدار (تن)',
            'long_term' => 'همکاری بلندمدت',
            'export_history' => 'سابقه صادرات',
            'years' => 'سال‌های فعالیت',
            'export_markets' => 'بازارهای صادراتی',
            'visit' => 'امکان بازدید',
            'notes' => 'توضیحات تکمیلی',
        ];

        $supplierHidden = [
            'id', 'name', 'created_at', 'updated_at', 'status',
            'reviewed_at', 'archived_at', 'deleted_at',
            'photos', 'video', 'packaging_photos',
        ];

        $formatValue = function ($value) {
            if (is_null($value) || $value === '') return '—';
            if (is_bool($value)) return $value ? 'بله' : 'خیر';
            if (is_array($value)) return implode('، ', array_map(
                fn($item) => is_scalar($item) ? (string) $item : json_encode($item, JSON_UNESCAPED_UNICODE),
                $value
            ));
            if ($value instanceof \Illuminate\Support\Carbon) return $value->format('Y/m/d H:i');
            return (string) $value;
        };
    @endphp

    <div class="request-detail">
        @if(session('success'))
            <div class="request-detail-alert">{{ session('success') }}</div>
        @endif

        <div class="card request-detail-section">
            <div class="card-h" style="display:flex;justify-content:space-between;align-items:center;gap:12px;flex-wrap:wrap">
                <div>
                    <div style="font-weight:800">{{ $title }} #{{ $item->id }}</div>
                    <div class="request-detail-muted" style="margin-top:5px">
                        ثبت‌شده در {{ $item->created_at?->format('Y/m/d - H:i') ?? '—' }}
                    </div>
                </div>

                <a class="btn" href="{{ route('admin.Request') }}">بازگشت به فهرست</a>
            </div>

            <div class="card-b">
                <div class="request-detail-grid">
                    <div>
                        <div class="request-detail-heading">اطلاعات درخواست‌دهنده</div>

                        <div class="request-detail-fields">
                            <div class="request-detail-field">
                                <div class="request-detail-label">نام</div>
                                <div class="request-detail-value">{{ $item->name ?: '—' }}</div>
                            </div>

                            @if($isPrice)
                                @foreach([
                                    'company' => 'شرکت',
                                    'email' => 'ایمیل',
                                    'phone' => 'شماره تماس',
                                    'destination' => 'مقصد',
                                    'incoterm' => 'شرایط تحویل',
                                ] as $field => $label)
                                    <div class="request-detail-field">
                                        <div class="request-detail-label">{{ $label }}</div>
                                        <div class="request-detail-value">
                                            @if($field === 'email' && $item->$field)
                                                <a href="mailto:{{ $item->$field }}">{{ $item->$field }}</a>
                                            @elseif($field === 'phone' && $item->$field)
                                                <a href="tel:{{ $item->$field }}">{{ $item->$field }}</a>
                                            @else
                                                {{ $item->$field ?: '—' }}
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                @foreach($supplierLabels as $field => $label)
                                    @continue(in_array($field, $supplierHidden, true))
                                    @php $value = $item->$field; @endphp
                                    <div class="request-detail-field">
                                        <div class="request-detail-label">{{ $label }}</div>
                                        <div class="request-detail-value">
                                            @if(in_array($field, ['mobile','whatsapp'], true) && $value)
                                                <a href="tel:{{ $value }}">{{ $value }}</a>
                                            @else
                                                {{ $formatValue($value) }}
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        @if($isPrice)
                            <div class="request-detail-field" style="margin-top:18px">
                                <div class="request-detail-label">پیام / توضیحات</div>
                                <div class="request-detail-value">{{ $item->message ?: 'پیامی ثبت نشده است.' }}</div>
                            </div>
                        @endif

                        @if(!$isPrice && $item->notes)
                            <div class="request-detail-field" style="margin-top:18px">
                                <div class="request-detail-label">توضیحات تکمیلی</div>
                                <div class="request-detail-value">{{ $item->notes }}</div>
                            </div>
                        @endif

                        @if(!$isPrice)
                            @foreach([
                                'photos' => 'تصاویر محصول',
                                'packaging_photos' => 'تصاویر بسته‌بندی',
                                'video' => 'ویدئو',
                            ] as $field => $label)
                                @php $media = $item->$field; @endphp
                                @if(!empty($media))
                                    <div class="request-detail-field" style="margin-top:18px">
                                        <div class="request-detail-label">{{ $label }}</div>
                                        <div class="request-detail-value">
                                            @if(is_array($media))
                                                @foreach($media as $mediaUrl)
                                                    @if(is_string($mediaUrl) && $mediaUrl !== '')
                                                        <a href="{{ \Illuminate\Support\Facades\Storage::url($mediaUrl) }}" target="_blank" rel="noopener">مشاهده فایل</a><br>
                                                    @endif
                                                @endforeach
                                            @elseif(is_string($media))
                                                <a href="{{ \Illuminate\Support\Facades\Storage::url($media) }}" target="_blank" rel="noopener">مشاهده فایل</a>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    </div>

                    <div>
                        <div class="request-detail-heading">مدیریت درخواست</div>

                        <div class="request-detail-field">
                            <div class="request-detail-label">وضعیت فعلی</div>
                            <div class="request-detail-value">
                                {{ $statusLabels[$item->status] ?? $item->status }}
                            </div>
                        </div>

                        <div class="request-detail-field" style="margin-top:14px">
                            <div class="request-detail-label">وضعیت بررسی</div>
                            <div class="request-detail-value">
                                @if($item->reviewed_at)
                                    بررسی‌شده در {{ $item->reviewed_at->format('Y/m/d - H:i') }}
                                @else
                                    <span style="color:#60a5fa;font-weight:800">هنوز بررسی نشده</span>
                                @endif
                            </div>
                        </div>

                        @if($item->archived_at)
                            <div class="request-detail-field" style="margin-top:14px">
                                <div class="request-detail-label">تاریخ بایگانی</div>
                                <div class="request-detail-value">{{ $item->archived_at->format('Y/m/d - H:i') }}</div>
                            </div>
                        @endif

                        <div class="request-detail-actions">
                            @if(!$item->reviewed_at)
                                <form method="POST" action="{{ route('admin.Request.review', [$type, $item->id]) }}">
                                    @csrf
                                    <button class="btn p" type="submit">✓ علامت‌گذاری به‌عنوان بررسی‌شده</button>
                                </form>
                            @endif

                            <form class="request-detail-form" method="POST"
                                  action="{{ route('admin.Request.updateStatus', [$type, $item->id]) }}">
                                @csrf
                                @method('PATCH')

                                <select name="status" aria-label="وضعیت درخواست">
                                    @foreach($statusLabels as $key => $label)
                                        <option value="{{ $key }}" @selected($item->status === $key)>{{ $label }}</option>
                                    @endforeach
                                </select>

                                <button class="btn" type="submit">ثبت وضعیت</button>
                            </form>

                            @if($item->archived_at)
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

                            <form method="POST"
                                  action="{{ route('admin.Request.destroy', [$type, $item->id]) }}"
                                  onsubmit="return confirm('این درخواست به زباله‌دان منتقل شود؟')">
                                @csrf
                                @method('DELETE')
                                <button class="btn dn" type="submit">انتقال به زباله‌دان</button>
                            </form>
                        </div>

                        <p class="request-detail-muted" style="margin-top:16px">
                            بازکردن این صفحه وضعیت بررسی را تغییر نمی‌دهد. برای ثبت بررسی، دکمهٔ مربوطه را بزن.
                        </p>
                    </div>
                </div>

                @if($isPrice)
                    <div style="margin-top:26px">
                        <div class="request-detail-heading">محصولات درخواستی</div>

                        <div style="overflow-x:auto">
                            <table class="request-detail-table">
                                <thead>
                                <tr>
                                    <th>محصول</th>
                                    <th>مقدار</th>
                                    <th>بسته‌بندی</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($item->items as $requestItem)
                                    @php
                                        $productName = $requestItem->product?->name;
                                        if (is_array($productName)) {
                                            $productName = $productName['fa'] ?? $productName['en'] ?? 'محصول حذف‌شده';
                                        }
                                    @endphp
                                    <tr>
                                        <td>{{ $productName ?: 'محصول حذف‌شده' }}</td>
                                        <td>{{ $requestItem->quantity ?? '—' }}</td>
                                        <td>{{ $requestItem->packaging ?? '—' }}</td>
                                    </tr>
                                @empty
                                    <tr><td colspan="3">محصولی به این استعلام متصل نشده است.</td></tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
