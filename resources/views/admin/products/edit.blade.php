@extends('admin.layouts.app')

@section('title', 'ویرایش محصول')
@section('page-title', 'ویرایش محصول')
@section('page-subtitle', 'به‌روزرسانی اطلاعات محصول')

@section('content')
    <div class="card">
        <div class="card-header">
            <div>اطلاعات محصول</div>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-grid">
                    {{-- نام محصول --}}
                    <div class="field full">
                        <label>نام فارسی *</label>
                        <input
                            name="name[fa]"
                            value="{{ old('name.fa', is_array($product->name) ? ($product->name['fa'] ?? '') : '') }}"
                            required
                        >
                    </div>

                    <div class="field">
                        <label>نام انگلیسی</label>
                        <input
                            name="name[en]"
                            dir="ltr"
                            value="{{ old('name.en', is_array($product->name) ? ($product->name['en'] ?? '') : '') }}"
                        >
                    </div>

                    <div class="field">
                        <label>نام عربی</label>
                        <input
                            name="name[ar]"
                            dir="rtl"
                            value="{{ old('name.ar', is_array($product->name) ? ($product->name['ar'] ?? '') : '') }}"
                        >
                    </div>

                    {{-- دسته‌بندی --}}
                    <div class="field">
                        <label>دسته‌بندی</label>
                        <select name="category">
                            <option value="vegetables" @selected(old('category', $product->category) === 'vegetables')>
                                صیفی‌جات
                            </option>
                            <option value="stone-fruits" @selected(old('category', $product->category) === 'stone-fruits')>
                                میوه‌های هسته‌دار
                            </option>
                            <option value="orchard-fruits" @selected(old('category', $product->category) === 'orchard-fruits')>
                                میوه‌های باغی
                            </option>
                            <option value="citrus-melons" @selected(old('category', $product->category) === 'citrus-melons')>
                                مرکبات و جالیزی
                            </option>
                        </select>
                    </div>

                    {{-- وضعیت موجودی --}}
                    <div class="field">
                        <label>وضعیت موجودی</label>
                        <select name="status">
                            <option value="available" @selected(old('status', $product->status) === 'available')>
                                موجود
                            </option>
                            <option value="off_season" @selected(old('status', $product->status) === 'off_season')>
                                خارج از فصل
                            </option>
                        </select>
                    </div>

                    {{-- نمایش در سایت --}}
                    <div class="field">
                        <label>نمایش در سایت</label>
                        <select name="hidden">
                            <option value="0" @selected(old('hidden', $product->hidden ? '1' : '0') == '0')>
                                بله، نمایش داده شود
                            </option>
                            <option value="1" @selected(old('hidden', $product->hidden ? '1' : '0') == '1')>
                                خیر، مخفی باشد
                            </option>
                        </select>
                    </div>

                    {{-- تصویر --}}
                    <div class="field full">
                        <label>عکس محصول</label>
                        <input
                            type="file"
                            name="image"
                            accept="image/jpeg,image/png,image/webp,image/jpg"
                        >
                    </div>

                    @if($product->image)
                        <div class="field full">
                            <label>تصویر فعلی</label>
                            <img
                                src="{{ $product->image }}"
                                alt="{{ is_array($product->name) ? ($product->name['fa'] ?? '') : '' }}"
                                style="max-width: 220px; border-radius: 12px;"
                            >
                        </div>
                    @endif

                    {{-- توضیحات چندزبانه --}}
                    <div class="field full">
                        <label>توضیح کوتاه فارسی</label>
                        <textarea name="summary[fa]" rows="3">{{ old('summary.fa', is_array($product->summary) ? ($product->summary['fa'] ?? '') : '') }}</textarea>
                    </div>

                    <div class="field full">
                        <label>توضیح کوتاه انگلیسی</label>
                        <textarea name="summary[en]" rows="3" dir="ltr">{{ old('summary.en', is_array($product->summary) ? ($product->summary['en'] ?? '') : '') }}</textarea>
                    </div>

                    <div class="field full">
                        <label>توضیح کوتاه عربی</label>
                        <textarea name="summary[ar]" rows="3" dir="rtl">{{ old('summary.ar', is_array($product->summary) ? ($product->summary['ar'] ?? '') : '') }}</textarea>
                    </div>

                    {{-- سایز چندزبانه --}}
                    <div class="field full">
                        <label>سایز معمول محصول</label>
                        <input
                            name="size_translations[fa]"
                            value="{{ old('size_translations.fa', is_array($product->size_translations) ? ($product->size_translations['fa'] ?? $product->size ?? '') : ($product->size ?? '')) }}"
                            placeholder="مثلاً: کوچک، متوسط، بزرگ"
                        >
                    </div>

                    <div class="field">
                        <label>سایز معمول — انگلیسی</label>
                        <input
                            name="size_translations[en]"
                            dir="ltr"
                            value="{{ old('size_translations.en', is_array($product->size_translations) ? ($product->size_translations['en'] ?? '') : '') }}"
                            placeholder="Small, Medium, Large"
                        >
                    </div>

                    <div class="field">
                        <label>سایز معمول — عربی</label>
                        <input
                            name="size_translations[ar]"
                            dir="rtl"
                            value="{{ old('size_translations.ar', is_array($product->size_translations) ? ($product->size_translations['ar'] ?? '') : '') }}"
                        >
                    </div>

                    {{-- بسته‌بندی چندزبانه --}}
                    <div class="field full">
                        <label>بسته‌بندی</label>
                        <input
                            name="packaging_translations[fa]"
                            value="{{ old('packaging_translations.fa', is_array($product->packaging_translations) ? ($product->packaging_translations['fa'] ?? $product->packaging ?? '') : ($product->packaging ?? '')) }}"
                            placeholder="مثلاً: کارتن ۵ کیلویی"
                        >
                    </div>

                    <div class="field">
                        <label>بسته‌بندی — انگلیسی</label>
                        <input
                            name="packaging_translations[en]"
                            dir="ltr"
                            value="{{ old('packaging_translations.en', is_array($product->packaging_translations) ? ($product->packaging_translations['en'] ?? '') : '') }}"
                            placeholder="5 kg carton"
                        >
                    </div>

                    <div class="field">
                        <label>بسته‌بندی — عربی</label>
                        <input
                            name="packaging_translations[ar]"
                            dir="rtl"
                            value="{{ old('packaging_translations.ar', is_array($product->packaging_translations) ? ($product->packaging_translations['ar'] ?? '') : '') }}"
                        >
                    </div>

                    {{-- حداقل سفارش چندزبانه --}}
                    <div class="field full">
                        <label>حداقل سفارش</label>
                        <input
                            name="min_order_translations[fa]"
                            value="{{ old('min_order_translations.fa', is_array($product->min_order_translations) ? ($product->min_order_translations['fa'] ?? $product->min_order ?? '') : ($product->min_order ?? '')) }}"
                            placeholder="مثلاً: حداقل ۱ تن"
                        >
                    </div>

                    <div class="field">
                        <label>حداقل سفارش — انگلیسی</label>
                        <input
                            name="min_order_translations[en]"
                            dir="ltr"
                            value="{{ old('min_order_translations.en', is_array($product->min_order_translations) ? ($product->min_order_translations['en'] ?? '') : '') }}"
                            placeholder="Minimum 1 ton"
                        >
                    </div>

                    <div class="field">
                        <label>حداقل سفارش — عربی</label>
                        <input
                            name="min_order_translations[ar]"
                            dir="rtl"
                            value="{{ old('min_order_translations.ar', is_array($product->min_order_translations) ? ($product->min_order_translations['ar'] ?? '') : '') }}"
                        >
                    </div>
                </div>

                {{-- ماه‌های برداشت --}}
                @include('admin.products._months', [
                    'productMonths' => $product->months ?? [],
                ])

                <div class="actions">
                    <a class="btn" href="{{ route('admin.products.index') }}">انصراف</a>
                    <button class="btn btn-primary" type="submit">ذخیره تغییرات</button>
                </div>
            </form>
        </div>
    </div>
@endsection
