@extends('admin.layouts.app')

@section('title', 'داشبورد')
@section('page-title', 'داشبورد')
@section('page-subtitle', 'خلاصه وضعیت سایت')

@section('content')
<div style="display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:16px">
    <div class="card">
        <div class="card-body">
            <div style="color:#6b7280">تعداد محصولات</div>
            <div style="font-size:28px;font-weight:700;margin-top:6px">{{ $productsCount }}</div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div style="color:#6b7280">درخواست‌های تامین‌کنندگان</div>
            <div style="font-size:28px;font-weight:700;margin-top:6px">{{ $suppliersCount }}</div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div style="color:#6b7280">مدیریت سریع</div>
            <div style="margin-top:10px;display:flex;gap:10px;flex-wrap:wrap">
                <a class="btn btn-primary" href="{{ route('admin.products.create') }}">افزودن محصول جدید</a>
                <a class="btn" href="{{ route('admin.products.index') }}">لیست محصولات</a>
            </div>
        </div>
    </div>
</div>
@endsection
