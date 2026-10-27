@extends('admin.layouts.app')

@section('title', 'محصولات')
@section('page-title', 'محصولات')
@section('page-subtitle', 'مدیریت فهرست محصولات سایت')

@section('content')
<div class="card">
    <div class="card-h">
        <div>لیست محصولات</div>
        <a class="btn p" href="{{ route('admin.products.create') }}">+ افزودن محصول</a>
    </div>
    <div class="card-b">
        <table class="table">
            <thead>
                <tr>
                    <th>عکس</th>
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
                    <td>@if($p->image)<img src="{{ $p->image }}" alt="" style="width:56px;height:56px;object-fit:cover;border-radius:12px">@else <span style="color:var(--sub)">—</span> @endif</td>
                    <td>{{ is_array($p->name) ? ($p->name['fa'] ?? '-') : $p->name }}</td>
                    <td>{{ $p->category }}</td>
                    <td>{{ $p->status === 'available' ? 'موجود' : 'خارج از فصل' }}</td>
                    <td>{{ $p->hidden ? 'مخفی' : 'نمایش داده شده' }}</td>
                    <td style="display:flex;gap:8px">
                        <a class="btn" href="{{ route('admin.products.edit', $p) }}">ویرایش</a>
                        <form method="POST" action="{{ route('admin.products.destroy', $p) }}" onsubmit="return confirm('آیا از حذف این محصول اطمینان دارید؟');">
                            @csrf
                            @method('DELETE')
                            <button class="btn dn" type="submit">حذف</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6">هیچ محصولی ثبت نشده است</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
