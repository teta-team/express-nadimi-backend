@extends('admin.layouts.app')

@section('title', 'زباله‌دان محصولات')
@section('page-title', 'زباله‌دان محصولات')
@section('page-subtitle', 'مدیریت و بازیابی محصولات حذف‌شده')

@section('content')
    <style>
        .products-page {
            width: 100%;
            min-width: 0;
        }

        .products-toolbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 14px;
        }

        .products-toolbar-actions {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
        }

        .products-table-wrap {
            width: 100%;
            overflow-x: auto;
        }

        .products-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            table-layout: auto;
        }

        .products-table th,
        .products-table td {
            padding: 16px 12px;
            text-align: right;
            vertical-align: middle;
            border-bottom: 1px solid var(--border, #e5e7eb);
        }

        .products-table th {
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
        }

        .products-table tbody tr {
            transition: background-color .2s ease;
        }

        .products-table tbody tr:hover {
            background-color: rgba(59, 130, 246, .08);
        }

        .products-table tbody tr:last-child td {
            border-bottom: 0;
        }

        .product-image {
            display: block;
            width: 62px;
            height: 62px;
            object-fit: cover;
            border-radius: 10px;
        }

        .product-image-placeholder {
            display: grid;
            place-items: center;
            width: 62px;
            height: 62px;
            border-radius: 10px;
            background: var(--soft, #f3f4f6);
            color: var(--muted, #6b7280);
            font-size: 22px;
        }

        .product-name {
            font-size: 13px;
            font-weight: 700;
            overflow-wrap: anywhere;
        }

        .product-id {
            margin-top: 5px;
            font-size: 11px;
            color: var(--muted, #6b7280);
        }

        .product-category,
        .deleted-date {
            font-size: 12px;
            color: var(--muted, #6b7280);
            line-height: 1.9;
        }

        .trash-actions {
            display: flex;
            align-items: center;
            gap: 7px;
            flex-wrap: wrap;
        }

        .trash-action {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
            padding: 8px 11px;
            border: 1px solid var(--border, #d1d5db);
            border-radius: 8px;
            background: transparent;
            color: var(--text, #1f2937);
            font: inherit;
            font-size: 11px;
            font-weight: 700;
            text-decoration: none;
            white-space: nowrap;
            cursor: pointer;
            transition: background-color .2s ease, border-color .2s ease, color .2s ease;
        }

        .trash-action:hover {
            background-color: rgba(59, 130, 246, .12);
            border-color: rgba(59, 130, 246, .45);
            color: #2563eb;
        }

        .trash-action:focus-visible,
        .pagination-number:focus-visible,
        .pagination-arrow:focus-visible,
        .trash-modal button:focus-visible {
            outline: 2px solid #3b82f6;
            outline-offset: 3px;
        }

        .trash-action.restore {
            color: #15803d;
            border-color: rgba(34, 197, 94, .3);
        }

        .trash-action.restore:hover {
            background-color: rgba(34, 197, 94, .12);
            border-color: rgba(34, 197, 94, .5);
            color: #15803d;
        }

        .trash-action.delete-permanently {
            color: #dc2626;
            border-color: rgba(239, 68, 68, .3);
        }

        .trash-action.delete-permanently:hover {
            background-color: rgba(239, 68, 68, .12);
            border-color: rgba(239, 68, 68, .5);
            color: #dc2626;
        }

        .products-empty {
            padding: 48px 16px !important;
            text-align: center !important;
            color: var(--muted, #6b7280);
        }

        .products-empty-icon {
            margin-bottom: 12px;
            font-size: 34px;
        }

        .products-empty-title {
            font-size: 14px;
            font-weight: 700;
            color: var(--text, #1f2937);
        }

        .products-empty-description {
            margin-top: 7px;
            font-size: 12px;
        }

        .products-pagination {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 14px;
            padding: 18px 20px;
            border-top: 1px solid var(--border, #e5e7eb);
        }

        .products-pagination-info {
            font-size: 12px;
            color: var(--muted, #6b7280);
        }

        .products-pagination-info strong {
            color: var(--text, #1f2937);
        }

        .products-pagination-links {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            gap: 6px;
        }

        .pagination-number,
        .pagination-arrow {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 36px;
            height: 36px;
            padding: 0 10px;
            border: 1px solid var(--border, #d1d5db);
            border-radius: 8px;
            background: transparent;
            color: var(--text, #1f2937);
            font-size: 12px;
            text-decoration: none;
            transition: background-color .2s ease, border-color .2s ease, color .2s ease;
        }

        .pagination-number:hover,
        .pagination-arrow:not(.disabled):hover {
            background-color: rgba(59, 130, 246, .12);
            border-color: rgba(59, 130, 246, .45);
            color: #2563eb;
        }

        .pagination-number.active {
            background-color: #2563eb;
            border-color: #2563eb;
            color: #fff;
            font-weight: 700;
        }

        .pagination-arrow.disabled {
            opacity: .45;
            cursor: not-allowed;
        }

        .pagination-dots {
            padding: 0 4px;
            color: var(--muted, #6b7280);
        }

        .trash-modal {
            width: min(440px, calc(100% - 28px));
            max-width: 440px;
            max-height: calc(100% - 32px);
            overflow-y: auto;
            margin: auto;
            padding: 0;
            border: 1px solid var(--border, #d1d5db);
            border-radius: 16px;
            background: var(--card, #fff);
            color: var(--text, #1f2937);
            box-shadow: 0 24px 70px rgba(0, 0, 0, .24);
        }

        .trash-modal[open] {
            animation: trash-modal-enter .18s ease-out;
        }

        .trash-modal::backdrop {
            background: rgba(15, 23, 42, .6);
            backdrop-filter: blur(3px);
        }

        .trash-modal-content {
            padding: 24px;
        }

        .trash-modal-icon {
            display: grid;
            place-items: center;
            width: 46px;
            height: 46px;
            margin-bottom: 16px;
            border-radius: 12px;
            background: rgba(239, 68, 68, .12);
            color: #dc2626;
            font-size: 22px;
        }

        .trash-modal-icon.restore {
            background: rgba(34, 197, 94, .12);
            color: #15803d;
        }

        .trash-modal h3 {
            margin: 0 0 9px;
            color: var(--text, #1f2937);
            font-size: 17px;
            font-weight: 800;
        }

        .trash-modal p {
            margin: 0;
            color: var(--muted, #6b7280);
            font-size: 13px;
            line-height: 2;
            overflow-wrap: anywhere;
        }

        .trash-modal-actions {
            display: flex;
            justify-content: flex-end;
            gap: 9px;
            margin-top: 24px;
        }

        .trash-modal-actions button {
            min-height: 39px;
            min-width: 100px;
            padding: 9px 14px;
            border-radius: 8px;
            font: inherit;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
            transition: background-color .2s ease, border-color .2s ease, color .2s ease;
        }

        .trash-modal-cancel {
            border: 1px solid var(--border, #d1d5db);
            background: transparent;
            color: var(--text, #1f2937);
        }

        .trash-modal-cancel:hover {
            background-color: rgba(59, 130, 246, .08);
            border-color: rgba(59, 130, 246, .4);
        }

        .trash-modal-confirm {
            border: 1px solid #dc2626;
            background: #dc2626;
            color: #fff;
        }

        .trash-modal-confirm:hover {
            border-color: #b91c1c;
            background: #b91c1c;
        }

        .trash-modal-confirm.restore {
            border-color: #16a34a;
            background: #16a34a;
        }

        .trash-modal-confirm.restore:hover {
            border-color: #15803d;
            background: #15803d;
        }

        @keyframes trash-modal-enter {
            from {
                opacity: 0;
                transform: translateY(7px) scale(.98);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .trash-modal[open] {
                animation: none;
            }

            .trash-action,
            .pagination-number,
            .pagination-arrow,
            .trash-modal-actions button {
                transition: none;
            }
        }

        @media (max-width: 900px) {
            .products-table th:nth-child(3),
            .products-table td:nth-child(3) {
                display: none;
            }
        }

        @media (max-width: 560px) {
            .products-table th,
            .products-table td {
                padding: 12px 8px;
            }

            .product-image,
            .product-image-placeholder {
                width: 44px;
                height: 44px;
            }

            .trash-actions {
                flex-direction: column;
                align-items: stretch;
            }

            .trash-action {
                width: 100%;
                padding: 7px 5px;
                font-size: 10px;
            }

            .products-pagination {
                padding: 15px;
            }

            .products-pagination-info,
            .products-pagination-links {
                width: 100%;
                text-align: center;
            }

            .trash-modal-content {
                padding: 20px;
            }

            .trash-modal-actions button {
                flex: 1;
                min-width: 0;
            }
        }
    </style>

    <div class="products-page">
        <div class="card">
            <div class="card-h products-toolbar">
                <div>
                    <div style="font-weight:800;">زباله‌دان محصولات</div>
                    <div style="margin-top:5px;font-size:12px;color:var(--muted,#6b7280);">
                        مدیریت و بازیابی محصولات حذف‌شده
                    </div>
                </div>

                <div class="products-toolbar-actions">
                    <a class="btn" href="{{ route('admin.products.index') }}">
                        بازگشت به محصولات
                    </a>
                </div>
            </div>

            <div class="card-b products-table-wrap">
                <table class="table products-table">
                    <thead>
                    <tr>
                        <th>عکس</th>
                        <th>نام محصول</th>
                        <th>دسته‌بندی</th>
                        <th>تاریخ حذف</th>
                        <th>عملیات</th>
                    </tr>
                    </thead>

                    <tbody>
                    @forelse($products as $p)
                        @php
                            $productName = is_array($p->name)
                                ? ($p->name['fa'] ?? $p->name['en'] ?? 'بدون نام')
                                : ($p->name ?: 'بدون نام');

                            $categoryNames = [
                                'vegetables' => 'صیفی‌جات',
                                'stone-fruits' => 'میوه‌های هسته‌دار',
                                'orchard-fruits' => 'میوه‌های باغی',
                                'citrus-melons' => 'مرکبات و جالیزی',
                            ];
                        @endphp

                        <tr>
                            <td>
                                @if($p->image)
                                    <img
                                        class="product-image"
                                        src="{{ $p->image }}"
                                        alt="{{ $productName }}"
                                        loading="lazy"
                                    >
                                @else
                                    <div class="product-image-placeholder" aria-hidden="true">
                                        📦
                                    </div>
                                @endif
                            </td>

                            <td>
                                <div class="product-name">{{ $productName }}</div>
                                <div class="product-id">شناسه: {{ $p->id }}</div>
                            </td>

                            <td>
                                <span class="product-category">
                                    {{ $categoryNames[$p->category] ?? $p->category ?? '—' }}
                                </span>
                            </td>

                            <td>
                                <div class="deleted-date">
                                    {{ $p->deleted_at?->format('Y/m/d') ?? '—' }}

                                    @if($p->deleted_at)
                                        <br>
                                        {{ $p->deleted_at->format('H:i') }}
                                    @endif
                                </div>
                            </td>

                            <td>
                                <div class="trash-actions">
                                    <button
                                        type="button"
                                        class="trash-action restore js-open-trash-modal"
                                        data-action="{{ route('admin.products.restore', $p->id) }}"
                                        data-product-name="{{ $productName }}"
                                        data-action-type="restore"
                                        aria-label="بازیابی محصول {{ $productName }}"
                                    >
                                        ↶ بازیابی
                                    </button>

                                    <button
                                        type="button"
                                        class="trash-action delete-permanently js-open-trash-modal"
                                        data-action="{{ route('admin.products.forceDelete', $p->id) }}"
                                        data-product-name="{{ $productName }}"
                                        data-action-type="delete"
                                        aria-label="حذف دائمی محصول {{ $productName }}"
                                    >
                                        × حذف دائمی
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="products-empty">
                                <div class="products-empty-icon">🗑</div>

                                <div class="products-empty-title">
                                    زباله‌دان خالی است
                                </div>

                                <div class="products-empty-description">
                                    در حال حاضر محصول حذف‌شده‌ای وجود ندارد.
                                </div>

                                <div style="margin-top:16px;">
                                    <a class="btn" href="{{ route('admin.products.index') }}">
                                        بازگشت به محصولات
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

            @if ($products->hasPages())
                <div class="products-pagination">
                    <div class="products-pagination-info">
                        نمایش
                        <strong>{{ $products->firstItem() }}</strong>
                        تا
                        <strong>{{ $products->lastItem() }}</strong>
                        از
                        <strong>{{ $products->total() }}</strong>
                        محصول
                    </div>

                    <nav class="products-pagination-links" aria-label="صفحه‌بندی محصولات">
                        @if ($products->onFirstPage())
                            <span class="pagination-arrow disabled" aria-disabled="true">
                                قبلی
                            </span>
                        @else
                            <a class="pagination-arrow" href="{{ $products->previousPageUrl() }}">
                                قبلی
                            </a>
                        @endif

                        @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                            @if (
                                $page === 1 ||
                                $page === $products->lastPage() ||
                                abs($page - $products->currentPage()) <= 1
                            )
                                @if ($page === $products->currentPage())
                                    <span class="pagination-number active" aria-current="page">
                                        {{ $page }}
                                    </span>
                                @else
                                    <a class="pagination-number" href="{{ $url }}">
                                        {{ $page }}
                                    </a>
                                @endif
                            @elseif (
                                $page === 2 &&
                                $products->currentPage() > 3
                            )
                                <span class="pagination-dots">…</span>
                            @elseif (
                                $page === $products->lastPage() - 1 &&
                                $products->currentPage() < $products->lastPage() - 2
                            )
                                <span class="pagination-dots">…</span>
                            @endif
                        @endforeach

                        @if ($products->hasMorePages())
                            <a class="pagination-arrow" href="{{ $products->nextPageUrl() }}">
                                بعدی
                            </a>
                        @else
                            <span class="pagination-arrow disabled" aria-disabled="true">
                                بعدی
                            </span>
                        @endif
                    </nav>
                </div>
            @endif
        </div>
    </div>

    <dialog
        class="trash-modal"
        id="trashActionModal"
        aria-labelledby="trashModalTitle"
        aria-describedby="trashModalDescription"
    >
        <div class="trash-modal-content">
            <div class="trash-modal-icon" id="trashModalIcon" aria-hidden="true">
                !
            </div>

            <h3 id="trashModalTitle">تأیید عملیات</h3>

            <p id="trashModalDescription">
                آیا از انجام این عملیات مطمئنی؟
            </p>

            <form id="trashActionForm" method="POST">
                @csrf

                <input
                    type="hidden"
                    name="_method"
                    id="trashMethod"
                    value="DELETE"
                    disabled
                >

                <div class="trash-modal-actions">
                    <button
                        type="button"
                        class="trash-modal-cancel"
                        id="cancelTrashAction"
                    >
                        انصراف
                    </button>

                    <button
                        type="submit"
                        class="trash-modal-confirm"
                        id="confirmTrashAction"
                    >
                        تأیید
                    </button>
                </div>
            </form>
        </div>
    </dialog>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const modal = document.getElementById('trashActionModal');
            const form = document.getElementById('trashActionForm');
            const methodInput = document.getElementById('trashMethod');
            const icon = document.getElementById('trashModalIcon');
            const title = document.getElementById('trashModalTitle');
            const description = document.getElementById('trashModalDescription');
            const confirmButton = document.getElementById('confirmTrashAction');
            const cancelButton = document.getElementById('cancelTrashAction');

            if (
                !modal ||
                !form ||
                !methodInput ||
                !icon ||
                !title ||
                !description ||
                !confirmButton ||
                !cancelButton
            ) {
                return;
            }

            document.querySelectorAll('.js-open-trash-modal').forEach(function (button) {
                button.addEventListener('click', function () {
                    const action = button.dataset.action;
                    const productName = button.dataset.productName || 'این محصول';
                    const actionType = button.dataset.actionType;

                    if (!action || !['restore', 'delete'].includes(actionType)) {
                        return;
                    }

                    form.action = action;

                    if (actionType === 'restore') {
                        methodInput.disabled = true;

                        icon.textContent = '↶';
                        icon.classList.add('restore');

                        title.textContent = 'بازیابی محصول';

                        description.textContent =
                            `آیا مطمئنی می‌خواهی محصول «${productName}» را بازیابی کنی؟ ` +
                            'این محصول دوباره به فهرست محصولات برمی‌گردد.';

                        confirmButton.textContent = 'بله، بازیابی شود';
                        confirmButton.classList.add('restore');
                    } else {
                        methodInput.value = 'DELETE';
                        methodInput.disabled = false;

                        icon.textContent = '!';
                        icon.classList.remove('restore');

                        title.textContent = 'حذف دائمی محصول';

                        description.textContent =
                            `آیا مطمئنی می‌خواهی محصول «${productName}» را برای همیشه حذف کنی؟ ` +
                            'این عملیات قابل بازگشت نیست.';

                        confirmButton.textContent = 'بله، حذف دائمی شود';
                        confirmButton.classList.remove('restore');
                    }

                    if (typeof modal.showModal === 'function') {
                        modal.showModal();
                    }
                });
            });

            cancelButton.addEventListener('click', function () {
                modal.close();
            });

            modal.addEventListener('click', function (event) {
                if (event.target === modal) {
                    modal.close();
                }
            });

            modal.addEventListener('close', function () {
                confirmButton.classList.remove('restore');
                icon.classList.remove('restore');
            });
        });
    </script>
@endsection
