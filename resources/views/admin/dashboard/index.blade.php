@extends('admin.layouts.app')

@section('title', 'داشبورد')
@section('page-title', 'داشبورد')
@section('page-subtitle', 'خلاصه وضعیت سایت')

@section('content')
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(190px,1fr));gap:16px">
        <div class="card">
            <div style="padding:24px">
                <div style="color:#9aa3b9">تعداد محصولات</div>
                <div style="font-size:28px;font-weight:800;margin-top:6px">{{ $productsCount }}</div>
            </div>
        </div>
        <div class="card">
            <div style="padding:24px">
                <div style="color:#9aa3b9">استعلام‌های قیمت</div>
                <div style="font-size:28px;font-weight:800;margin-top:6px">{{ $priceInquiriesCount }}</div>
            </div>
        </div>
        <div class="card">
            <div style="padding:24px">
                <div style="color:#9aa3b9">درخواست‌های تامین‌کنندگان</div>
                <div style="font-size:28px;font-weight:800;margin-top:6px">{{ $suppliersCount }}</div>
            </div>
        </div>
        <div class="card">
            <div style="padding:24px">
                <div style="color:#9aa3b9">پیام‌های تماس</div>
                <div style="font-size:28px;font-weight:800;margin-top:6px">{{ $contactMessagesCount }}</div>
            </div>
        </div>
        <div class="card">
            <div style="padding:24px">
                <div style="color:#9aa3b9">در انتظار بررسی</div>
                <div style="font-size:28px;font-weight:800;margin-top:6px;color:#4ade80">{{ $newRequestsCount }}</div>
            </div>
        </div>
    </div>

    <div class="card" style="margin-top:18px">
        <div class="card-h">
            <b>آخرین استعلام‌های قیمت</b>
            <a class="btn sm" href="{{ route('admin.Request', ['type' => 'price']) }}">همه درخواست‌ها</a>
        </div>

        <div class="card-b">
            <table class="table">
                <thead>
                    <tr>
                        <th>نام</th>
                        <th>مقصد</th>
                        <th>محصولات</th>
                        <th>تاریخ</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentInquiries as $inquiry)
                        <tr>
                            <td>{{ $inquiry->name }}</td>
                            <td>{{ $inquiry->destination }}</td>
                            <td>
                                @foreach($inquiry->items as $item)
                                    <span class="badge">{{ $item->product?->name['fa'] ?? $item->product?->slug ?? '—' }}</span>
                                @endforeach
                            </td>
                            <td style="white-space:nowrap">{{ $inquiry->created_at?->format('Y-m-d H:i') }}</td>
                            <td><a class="btn sm" href="{{ route('admin.Request.show', ['price', $inquiry->id]) }}">مشاهده</a></td>
                        </tr>
                    @empty
                        <tr><td colspan="5"><div class="empty">هنوز استعلامی ثبت نشده است.</div></td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div style="margin-top:18px;display:flex;gap:10px;flex-wrap:wrap">
        <a class="btn p" href="{{ route('admin.products.create') }}">افزودن محصول جدید</a>
        <a class="btn" href="{{ route('admin.products.index') }}">لیست محصولات</a>
        <a class="btn" href="{{ route('admin.messages.index') }}">پیام‌های تماس</a>
    </div>
@endsection