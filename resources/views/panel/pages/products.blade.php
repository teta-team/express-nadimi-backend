@extends('panel.layouts.app')

@section('title', 'محصولات')
@section('subtitle', 'مدیریت محصولات سایت')

@section('content')
<div class="card">
    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:14px">
        <div>لیست محصولات</div>
        <a class="btn p" href="{{ route('panel.products.create') }}">+ افزودن محصول</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>نام فارسی</th>
                <th>دسته‌بندی</th>
                <th>وضعیت</th>
                <th>نمایش</th>
                <th>عملیات</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $p)
            <tr>
                <td>{{ is_array($p->name) ? ($p->name['fa'] ?? '-') : $p->name }}</td>
                <td>{{ $p->category }}</td>
                <td>{{ $p->status === 'available' ? 'موجود' : 'خارج از فصل' }}</td>
                <td>{{ $p->hidden ? 'مخفی' : 'نمایش' }}</td>
                <td class="row">
                    <a class="btn" href="{{ route('panel.products.edit', $p) }}">ویرایش</a>
                    <form method="POST" action="{{ route('panel.products.destroy', $p) }}" onsubmit="return confirm('حذف شود؟');">
                        @csrf
                        @method('DELETE')
                        <button class="btn dn" type="submit">حذف</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="5">محصولی ثبت نشده</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
