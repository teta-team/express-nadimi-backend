@extends('admin.layouts.app')

@section('title', 'ویرایش محصول')
@section('page-title', 'ویرایش محصول')
@section('page-subtitle', 'به‌روزرسانی اطلاعات محصول')

@section('content')
<div class="card">
    <div class="card-header"><div>اطلاعات محصول</div></div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-grid">
                <div class="field full"><label>نام فارسی *</label><input name="name[fa]" value="{{ is_array($product->name) ? ($product->name['fa'] ?? '') : '' }}" required></div>
                <div class="field"><label>نام انگلیسی</label><input name="name[en]" dir="ltr" value="{{ is_array($product->name) ? ($product->name['en'] ?? '') : '' }}"></div>
                <div class="field"><label>نام عربی</label><input name="name[ar]" dir="rtl" value="{{ is_array($product->name) ? ($product->name['ar'] ?? '') : '' }}"></div>
                <div class="field"><label>دسته‌بندی</label>
                    <select name="category">
                        <option value="vegetables" @selected($product->category=='vegetables')>صیفی‌جات</option>
                        <option value="stone-fruits" @selected($product->category=='stone-fruits')>میوه‌های هسته‌دار</option>
                        <option value="orchard-fruits" @selected($product->category=='orchard-fruits')>میوه‌های باغی</option>
                        <option value="citrus-melons" @selected($product->category=='citrus-melons')>مرکبات و جالیزی</option>
                    </select>
                </div>
                <div class="field"><label>وضعیت</label>
                    <select name="status">
                        <option value="available" @selected($product->status=='available')>موجود</option>
                        <option value="off_season" @selected($product->status=='off_season')>خارج از فصل</option>
                    </select>
                </div>
                <div class="field"><label>نمایش در سایت</label>
                    <select name="hidden">
                        <option value="0" @selected(!$product->hidden)>بله، نمایش داده شود</option>
                        <option value="1" @selected($product->hidden)>خیر، مخفی باشد</option>
                    </select>
                </div>
                <div class="field full"><label>عکس محصول</label><input type="file" name="image" accept="image/*"></div>
                @if($product->image)
                    <div class="field full"><img src="{{ $product->image }}" alt="" style="max-width:220px;border-radius:12px"></div>
                @endif
                <div class="field full"><label>توضیح کوتاه فارسی</label><textarea name="summary[fa]" rows="3">{{ is_array($product->summary) ? ($product->summary['fa'] ?? '') : '' }}</textarea></div>
                <div class="field full"><label>توضیح کوتاه انگلیسی</label><textarea name="summary[en]" rows="3" dir="ltr">{{ is_array($product->summary) ? ($product->summary['en'] ?? '') : '' }}</textarea></div>
                <div class="field full"><label>توضیح کوتاه عربی</label><textarea name="summary[ar]" rows="3" dir="rtl">{{ is_array($product->summary) ? ($product->summary['ar'] ?? '') : '' }}</textarea></div>
                <div class="field"><label>سایز معمول</label><input name="size" value="{{ $product->size }}"></div>
                <div class="field"><label>بسته‌بندی</label><input name="packaging" value="{{ $product->packaging }}"></div>
                <div class="field"><label>حداقل سفارش</label><input name="min_order" value="{{ $product->min_order }}"></div>
            </div>
            <div class="actions">
                <a class="btn" href="{{ route('admin.products.index') }}">انصراف</a>
                <button class="btn btn-primary" type="submit">ذخیره تغییرات</button>
            </div>
        </form>
    </div>
</div>
@endsection
