@extends('panel.layouts.app')

@section('title', 'ویرایش محصول')
@section('subtitle', 'ویرایش اطلاعات محصول')

@section('content')
<div class="card">
    <form method="POST" action="{{ route('panel.products.update', $product) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-grid">
            <label class="w">نام فارسی *<input name="name[fa]" value="{{ is_array($product->name) ? ($product->name['fa'] ?? '') : '' }}" required></label>
            <label>نام انگلیسی<input name="name[en]" dir="ltr" value="{{ is_array($product->name) ? ($product->name['en'] ?? '') : '' }}"></label>
            <label>نام عربی<input name="name[ar]" dir="rtl" value="{{ is_array($product->name) ? ($product->name['ar'] ?? '') : '' }}"></label>
            <label>دسته‌بندی
                <select name="category">
                    <option value="vegetables" @selected($product->category=='vegetables')>صیفی‌جات</option>
                    <option value="stone-fruits" @selected($product->category=='stone-fruits')>میوه‌های هسته‌دار</option>
                    <option value="orchard-fruits" @selected($product->category=='orchard-fruits')>میوه‌های باغی</option>
                    <option value="citrus-melons" @selected($product->category=='citrus-melons')>مرکبات و جالیزی</option>
                </select>
            </label>
            <label>وضعیت
                <select name="status">
                    <option value="available" @selected($product->status=='available')>موجود</option>
                    <option value="off_season" @selected($product->status=='off_season')>خارج از فصل</option>
                </select>
            </label>
            <label>مخفی باشد؟
                <select name="hidden">
                    <option value="0" @selected(!$product->hidden)>خیر، نمایش داده شود</option>
                    <option value="1" @selected($product->hidden)>بله، مخفی باشد</option>
                </select>
            </label>
            <label class="w">عکس محصول<input type="file" name="image" accept="image/*"></label>
            @if($product->image)
                <div class="w"><img src="{{ $product->image }}" alt="" style="max-width:200px;border-radius:10px"></div>
            @endif
            <label class="w">توضیح کوتاه فارسی<textarea name="summary[fa]" rows="3">{{ is_array($product->summary) ? ($product->summary['fa'] ?? '') : '' }}</textarea></label>
            <label class="w">توضیح کوتاه انگلیسی<textarea name="summary[en]" rows="3" dir="ltr">{{ is_array($product->summary) ? ($product->summary['en'] ?? '') : '' }}</textarea></label>
            <label class="w">توضیح کوتاه عربی<textarea name="summary[ar]" rows="3" dir="rtl">{{ is_array($product->summary) ? ($product->summary['ar'] ?? '') : '' }}</textarea></label>
            <label>سایز معمول<input name="size" value="{{ $product->size }}"></label>
            <label>بسته‌بندی<input name="packaging" value="{{ $product->packaging }}"></label>
            <label>حداقل سفارش<input name="min_order" value="{{ $product->min_order }}"></label>
        </div>
        <div class="bar">
            <a class="btn" href="{{ route('panel.products') }}">انصراف</a>
            <button class="btn p" type="submit">ذخیره تغییرات</button>
        </div>
    </form>
</div>
@endsection
