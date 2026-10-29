@extends('admin.layouts.app')

@section('title', $archived ? 'بایگانی درخواست‌ها' : 'درخواست‌ها')
@section('page-title', $archived ? 'بایگانی درخواست‌ها' : 'مدیریت درخواست‌ها')
@section('page-subtitle', 'مدیریت استعلام‌های قیمت و درخواست‌های همکاری تأمین‌کنندگان')

@section('content')
    <style>
        .requests-page{width:100%;min-width:0;color:var(--text,#e5e0d8)}
        .requests-toolbar,.requests-toolbar-actions,.requests-filters,.requests-actions,.requests-pagination,.requests-pagination-links{display:flex;align-items:center;gap:10px;flex-wrap:wrap}
        .requests-toolbar{justify-content:space-between}
        .requests-toolbar-actions{justify-content:flex-end}
        .requests-filters{padding:18px 22px;border-bottom:1px solid var(--border,#39332f);align-items:end}
        .requests-field{display:flex;flex-direction:column;gap:7px;flex:1;min-width:135px}
        .requests-field label{font-size:12px;color:var(--sub,#a59b91);font-weight:700}
        .requests-field input,.requests-field select{width:100%;min-height:42px;padding:9px 11px;border:1px solid var(--border,#39332f);border-radius:10px;background:var(--card,#25211e);color:var(--text,#e5e0d8);font:inherit;font-size:12px}
        .requests-field input:focus,.requests-field select:focus{outline:2px solid color-mix(in srgb,var(--primary,#8b5e3c) 35%,transparent);border-color:var(--primary,#8b5e3c)}
        .requests-table-wrap{width:100%;overflow-x:auto}
        .requests-table{width:100%;min-width:850px;border-collapse:separate;border-spacing:0;table-layout:auto}
        .requests-table th,.requests-table td{padding:16px 12px;text-align:right;vertical-align:middle;border-bottom:1px solid var(--border,#39332f)}
        .requests-table th{background:var(--soft,#292522);color:var(--sub,#a59b91);font-size:12px;white-space:nowrap}
        .requests-table tbody tr{transition:background .18s}
        .requests-table tbody tr:hover{background:color-mix(in srgb,var(--primary,#8b5e3c) 8%,transparent)}
        .requests-table tbody tr:last-child td{border-bottom:0}
        .request-main{font-size:13px;font-weight:800;line-height:1.9;overflow-wrap:anywhere}
        .request-meta{margin-top:4px;color:var(--sub,#a59b91);font-size:11px;line-height:1.9;overflow-wrap:anywhere}
        .request-badge{display:inline-flex;align-items:center;gap:6px;padding:6px 9px;border-radius:999px;font-size:11px;font-weight:800;white-space:nowrap;border:1px solid var(--border,#39332f)}
        .request-badge.new{background:rgba(59,130,246,.12);color:#60a5fa;border-color:rgba(96,165,250,.25)}
        .request-badge.price{background:rgba(201,168,117,.12);color:#d6b77e;border-color:rgba(201,168,117,.25)}
        .request-badge.supplier{background:rgba(86,201,149,.12);color:#56c995;border-color:rgba(86,201,149,.25)}
        .request-badge.status-in_progress{color:#60a5fa;background:rgba(59,130,246,.12)}
        .request-badge.status-follow_up{color:#d8ad62;background:rgba(153,101,21,.15)}
        .request-badge.status-closed{color:#56c995;background:rgba(22,121,75,.15)}
        .request-badge.status-new{color:#60a5fa;background:rgba(59,130,246,.12)}
        .request-actions{display:flex;align-items:center;gap:7px;flex-wrap:wrap}
        .request-action{display:inline-flex;align-items:center;justify-content:center;gap:6px;min-height:34px;padding:7px 10px;border:1px solid var(--border,#39332f);border-radius:9px;background:var(--card,#25211e);color:var(--text,#e5e0d8);font:inherit;font-size:11px;text-decoration:none;white-space:nowrap;cursor:pointer}
        .request-action:hover{border-color:var(--primary,#8b5e3c);background:color-mix(in srgb,var(--primary,#8b5e3c) 12%,var(--card,#25211e))}
        .request-action.primary{background:var(--primary,#8b5e3c);border-color:var(--primary,#8b5e3c);color:#fff}
        .request-action.danger{color:#e7776c}
        .request-action.success{color:#56c995}
        .request-empty{text-align:center!important;padding:52px 16px!important;color:var(--sub,#a59b91)}
        .request-empty-icon{font-size:34px;margin-bottom:12px}
        .request-empty-title{font-size:15px;font-weight:800;color:var(--text,#e5e0d8)}
        .request-empty-text{font-size:12px;margin-top:7px;line-height:2}
        .requests-summary{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:12px;margin-bottom:16px}
        .requests-summary-item{padding:17px 19px;border:1px solid var(--border,#39332f);border-radius:13px;background:var(--card,#25211e)}
        .requests-summary-label{font-size:12px;color:var(--sub,#a59b91)}
        .requests-summary-value{font-size:24px;font-weight:900;margin-top:8px}
        .requests-pagination{justify-content:space-between;padding:20px 24px;border-top:1px solid var(--border,#39332f)}
        .requests-pagination-info{font-size:12px;color:var(--sub,#a59b91)}
        .requests-pagination-info strong{color:var(--text,#e5e0d8)}
        .requests-pagination-links{justify-content:center;gap:6px}
        .pagination-number,.pagination-arrow{display:inline-flex;align-items:center;justify-content:center;min-width:36px;height:36px;padding:0 10px;border:1px solid var(--border,#39332f);border-radius:9px;background:var(--card,#25211e);color:var(--text,#e5e0d8);font-size:12px;text-decoration:none}
        .pagination-number.active{background:var(--primary,#8b5e3c);border-color:var(--primary,#8b5e3c);color:#fff;font-weight:800}
        .pagination-arrow.disabled{opacity:.4;pointer-events:none}
        .requests-alert{padding:12px 15px;margin-bottom:15px;border:1px solid rgba(86,201,149,.25);border-radius:10px;background:rgba(22,121,75,.12);color:#56c995;font-size:13px}
        @media(max-width:700px){.requests-summary{grid-template-columns:1fr}.requests-toolbar{align-items:flex-start}.requests-toolbar-actions{width:100%;justify-content:flex-start}.requests-filters{padding:14px}.requests-field{min-width:calc(50% - 10px)}.requests-pagination{padding:15px;justify-content:center}.requests-pagination-info{width:100%;text-align:center}}
        @media(max-width:430px){.requests-field{min-width:100%}.requests-toolbar-actions .btn{flex:1;text-align:center}}
    </style>

    @php
        $statusLabels = [
            'new' => 'جدید',
            'in_progress' => 'در حال پیگیری',
            'follow_up' => 'نیازمند پیگیری',
            'closed' => 'بسته‌شده',
        ];
    @endphp

    <div class="requests-page">

        @if(session('success'))
            <div class="requests-alert">{{ session('success') }}</div>
        @endif

        @if(!$archived)
            <div class="requests-summary">
                <div class="requests-summary-item">
                    <div class="requests-summary-label">استعلام‌های قیمت بررسی‌نشده</div>
                    <div class="requests-summary-value">{{ $newPriceCount }}</div>
                </div>
                <div class="requests-summary-item">
                    <div class="requests-summary-label">درخواست‌های همکاری بررسی‌نشده</div>
                    <div class="requests-summary-value">{{ $newSupplierCount }}</div>
                </div>
                <div class="requests-summary-item">
                    <div class="requests-summary-label">نتایج این صفحه</div>
                    <div class="requests-summary-value">{{ $requests->total() }}</div>
                </div>
            </div>
        @endif

        <div class="card">
            <div class="card-h requests-toolbar">
                <div>
                    <div style="font-weight:800">
                        {{ $archived ? 'درخواست‌های بایگانی‌شده' : 'فهرست درخواست‌ها' }}
                    </div>
                    <div style="margin-top:5px;color:var(--sub,#a59b91);font-size:12px">
                        مدیریت استعلام قیمت و همکاری تأمین‌کنندگان
                    </div>
                </div>

                <div class="requests-toolbar-actions">
                    @if($archived)
                        <a class="btn" href="{{ route('admin.Request') }}">بازگشت به درخواست‌ها</a>
                    @else
                        <a class="btn" href="{{ route('admin.Request.trash') }}">زباله‌دان</a>
                        <a class="btn" href="{{ route('admin.Request', ['archived' => 1]) }}">بایگانی</a>
                    @endif
                </div>
            </div>

            <form class="requests-filters" method="GET" action="{{ route('admin.Request') }}">
                @if($archived)
                    <input type="hidden" name="archived" value="1">
                @endif

                <div class="requests-field">
                    <label for="request-search">جست‌وجو</label>
                    <input id="request-search" type="search" name="search"
                           value="{{ $search }}" placeholder="نام، تماس، شرکت، محصول...">
                </div>

                <div class="requests-field">
                    <label for="request-type">نوع درخواست</label>
                    <select id="request-type" name="type">
                        <option value="all" @selected($type === 'all')>همه درخواست‌ها</option>
                        <option value="price" @selected($type === 'price')>استعلام قیمت</option>
                        <option value="supplier" @selected($type === 'supplier')>درخواست همکاری</option>
                    </select>
                </div>

                <div class="requests-field">
                    <label for="request-status">وضعیت</label>
                    <select id="request-status" name="status">
                        <option value="">همه وضعیت‌ها</option>
                        @foreach($statusLabels as $key => $label)
                            <option value="{{ $key }}" @selected($status === $key)>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="requests-field">
                    <label for="request-date-from">از تاریخ</label>
                    <input id="request-date-from" type="date" name="date_from" value="{{ $dateFrom }}">
                </div>

                <div class="requests-field">
                    <label for="request-date-to">تا تاریخ</label>
                    <input id="request-date-to" type="date" name="date_to" value="{{ $dateTo }}">
                </div>

                <button class="btn p" type="submit">اعمال فیلتر</button>
                <a class="btn" href="{{ route('admin.Request', $archived ? ['archived' => 1] : []) }}">پاک‌کردن</a>
            </form>

            <div class="requests-table-wrap">
                <table class="table requests-table">
                    <thead>
                    <tr>
                        <th>درخواست‌دهنده</th>
                        <th>نوع درخواست</th>
                        <th>وضعیت</th>
                        <th>تاریخ ثبت</th>
                        <th>بررسی</th>
                        <th>عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($requests as $item)
                        @php
                            $isNew = $item->reviewed_at === null;
                            $requestType = $item->request_type;
                            $detailUrl = route('admin.Request.show', [$requestType, $item->id]);
                        @endphp
                        <tr>
                            <td>
                                <div class="request-main">{{ $item->request_name ?: 'بدون نام' }}</div>
                                <div class="request-meta">
                                    شناسه: {{ $item->id }}<br>
                                    {{ $item->request_contact ?: 'اطلاعات تماس ثبت نشده' }}
                                    @if($requestType === 'price' && $item->company)
                                        <br>{{ $item->company }}
                                    @elseif($requestType === 'supplier' && ($item->city || $item->province))
                                        <br>{{ implode('، ', array_filter([$item->city, $item->province])) }}
                                    @endif
                                </div>
                            </td>
                            <td>
                            <span class="request-badge {{ $requestType }}">
                                {{ $item->request_label }}
                            </span>
                            </td>
                            <td>
                            <span class="request-badge status-{{ $item->status }}">
                                {{ $statusLabels[$item->status] ?? $item->status }}
                            </span>
                            </td>
                            <td>
                                <div class="request-main" style="font-size:12px">
                                    {{ $item->created_at?->format('Y/m/d') ?? '—' }}
                                </div>
                                <div class="request-meta">{{ $item->created_at?->format('H:i') }}</div>
                            </td>
                            <td>
                                @if($isNew)
                                    <span class="request-badge new">● جدید</span>
                                @else
                                    <span style="font-size:12px;color:#56c995">✓ بررسی‌شده</span>
                                @endif
                            </td>
                            <td>
                                <div class="requests-actions">
                                    <a class="request-action primary" href="{{ $detailUrl }}">مشاهده</a>

                                    @if(!$archived)
                                        <form method="POST" action="{{ route('admin.Request.archive', [$requestType, $item->id]) }}">
                                            @csrf
                                            <button class="request-action" type="submit">بایگانی</button>
                                        </form>

                                        <form method="POST" action="{{ route('admin.Request.destroy', [$requestType, $item->id]) }}"
                                              onsubmit="return confirm('این درخواست به زباله‌دان منتقل شود؟')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="request-action danger" type="submit">حذف</button>
                                        </form>
                                    @else
                                        <form method="POST" action="{{ route('admin.Request.unarchive', [$requestType, $item->id]) }}">
                                            @csrf
                                            <button class="request-action success" type="submit">خروج از بایگانی</button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="request-empty">
                                <div class="request-empty-icon">📨</div>
                                <div class="request-empty-title">درخواستی پیدا نشد</div>
                                <div class="request-empty-text">
                                    با تغییر فیلترها دوباره جست‌وجو کن.
                                </div>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

            @if($requests->hasPages())
                <div class="requests-pagination">
                    <div class="requests-pagination-info">
                        نمایش <strong>{{ $requests->firstItem() }}</strong>
                        تا <strong>{{ $requests->lastItem() }}</strong>
                        از <strong>{{ $requests->total() }}</strong> درخواست
                    </div>

                    <nav class="requests-pagination-links" aria-label="صفحه‌بندی درخواست‌ها">
                        @if($requests->onFirstPage())
                            <span class="pagination-arrow disabled">قبلی</span>
                        @else
                            <a class="pagination-arrow" href="{{ $requests->previousPageUrl() }}">قبلی</a>
                        @endif

                        @foreach($requests->getUrlRange(1, $requests->lastPage()) as $page => $url)
                            @if($page === 1 || $page === $requests->lastPage() || abs($page - $requests->currentPage()) <= 1)
                                @if($page === $requests->currentPage())
                                    <span class="pagination-number active">{{ $page }}</span>
                                @else
                                    <a class="pagination-number" href="{{ $url }}">{{ $page }}</a>
                                @endif
                            @elseif($page === 2 && $requests->currentPage() > 3)
                                <span>…</span>
                            @elseif($page === $requests->lastPage() - 1 && $requests->currentPage() < $requests->lastPage() - 2)
                                <span>…</span>
                            @endif
                        @endforeach

                        @if($requests->hasMorePages())
                            <a class="pagination-arrow" href="{{ $requests->nextPageUrl() }}">بعدی</a>
                        @else
                            <span class="pagination-arrow disabled">بعدی</span>
                        @endif
                    </nav>
                </div>
            @endif
        </div>
    </div>
@endsection
