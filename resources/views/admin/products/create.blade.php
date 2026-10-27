@extends('admin.layouts.app')

@section('title', 'افزودن محصول')
@section('page-title', 'افزودن محصول')
@section('page-subtitle', 'ثبت محصول جدید در سایت')

@section('content')
<div class="card">
    <div class="card-h"><div>اطلاعات محصول</div></div>
    <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-grid">
            <div class="field w"><label>نام فارسی *</label><input name="name[fa]" required></div>
            <div class="field"><label>نام انگلیسی</label><input name="name[en]" dir="ltr"></div>
            <div class="field"><label>نام عربی</label><input name="name[ar]" dir="rtl"></div>
            <div class="field"><label>دسته‌بندی</label>
                <select name="category">
                    <option value="vegetables">صیفی‌جات</option>
                    <option value="stone-fruits">میوه‌های هسته‌دار</option>
                    <option value="orchard-fruits">میوه‌های باغی</option>
                    <option value="citrus-melons">مرکبات و جالیزی</option>
                </select>
            </div>
            <div class="field"><label>وضعیت</label>
                <select name="status">
                    <option value="available">موجود</option>
                    <option value="off_season">خارج از فصل</option>
                </select>
            </div>
            <div class="field"><label>نمایش در سایت</label>
                <select name="hidden">
                    <option value="0">بله، نمایش داده شود</option>
                    <option value="1">خیر، مخفی باشد</option>
                </select>
            </div>
            <div class="field w"><label>عکس محصول</label><input type="file" name="image" accept="image/jpeg,image/png,image/webp,image/jpg"></div>
            <div class="field w"><label>توضیح کوتاه فارسی</label><textarea name="summary[fa]" rows="3"></textarea></div>
            <div class="field w"><label>توضیح کوتاه انگلیسی</label><textarea name="summary[en]" rows="3" dir="ltr"></textarea></div>
            <div class="field w"><label>توضیح کوتاه عربی</label><textarea name="summary[ar]" rows="3" dir="rtl"></textarea></div>
            <div class="field"><label>سایز معمول</label><input name="size"></div>
            <div class="field"><label>بسته‌بندی</label><input name="packaging"></div>
            <div class="field"><label>حداقل سفارش</label><input name="min_order"></div>
        </div>
        <div class="actions">
            <a class="btn" href="{{ route('admin.products.index') }}">انصراف</a>
            <button class="btn p" type="submit">ذخیره محصول</button>
        </div>
    </form>
</div>
@endsection
