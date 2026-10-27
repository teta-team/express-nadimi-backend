@extends('panel.layouts.app')

@section('title', 'افزودن محصول')
@section('subtitle', 'ثبت محصول جدید')

@section('content')
<div class="card">
    <form method="POST" action="{{ route('panel.products.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-grid">
            <label class="w">نام فارسی *<input name="name[fa]" required></label>
            <label>نام انگلیسی<input name="name[en]" dir="ltr"></label>
            <label>نام عربی<input name="name[ar]" dir="rtl"></label>
            <label>دسته‌بندی
                <select name="category">
                    <option value="vegetables">صیفی‌جات</option>
                    <option value="stone-fruits">میوه‌های هسته‌دار</option>
                    <option value="orchard-fruits">میوه‌های باغی</option>
                    <option value="citrus-melons">مرکبات و جالیزی</option>
                </select>
            </label>
            <label>وضعیت
                <select name="status">
                    <option value="available">موجود</option>
                    <option value="off_season">خارج از فصل</option>
                </select>
            </label>
            <label>مخفی باشد؟
                <select name="hidden">
                    <option value="0">خیر، نمایش داده شود</option>
                    <option value="1">بله، مخفی باشد</option>
                </select>
            </label>
            <label class="w">عکس محصول<input type="file" name="image" accept="image/*"></label>
            <label class="w">توضیح کوتاه فارسی<textarea name="summary[fa]" rows="3"></textarea></label>
            <label class="w">توضیح کوتاه انگلیسی<textarea name="summary[en]" rows="3" dir="ltr"></textarea></label>
            <label class="w">توضیح کوتاه عربی<textarea name="summary[ar]" rows="3" dir="rtl"></textarea></label>
            <label>سایز معمول<input name="size"></label>
            <label>بسته‌بندی<input name="packaging"></label>
            <label>حداقل سفارش<input name="min_order"></label>
        </div>
        <div class="bar">
            <a class="btn" href="{{ route('panel.products') }}">انصراف</a>
            <button class="btn p" type="submit">ذخیره محصول</button>
        </div>
    </form>
</div>
@endsection
