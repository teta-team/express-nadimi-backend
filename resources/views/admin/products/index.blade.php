@extends('admin.layouts.app')

@section('title', 'محصولات')
@section('page-title', 'محصولات')
@section('page-subtitle', 'مدیریت فهرست محصولات سایت')

@section('content')
    <style>
        .products-page {
            width: 100%;
            min-width: 0;
            color: var(--text, #e5e0d8);
        }

        .products-toolbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            flex-wrap: wrap;
        }

        .products-toolbar-actions {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
        }

        .products-table-wrap {
            width: 100%;
            overflow: visible;
        }

        .products-table {
            width: 100%;
            min-width: 0;
            border-collapse: separate;
            border-spacing: 0;
            table-layout: fixed;
        }

        .products-table th,
        .products-table td {
            padding: 18px 12px;
            text-align: right;
            vertical-align: middle;
            border-bottom: 1px solid var(--border, #39332f);
        }

        .products-table th {
            color: var(--sub, #a59b91);
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
            background: var(--soft, #292522);
        }

        .products-table tbody tr {
            height: 108px;
            transition: background .18s ease;
        }

        .products-table tbody tr:hover {
            background: color-mix(
                in srgb,
                var(--primary, #8b5e3c) 9%,
                transparent
            );
        }

        .products-table tbody tr:last-child td {
            border-bottom: 0;
        }

        .products-table th:first-child,
        .products-table td:first-child {
            width: 100px;
        }

        .products-table th:nth-child(2),
        .products-table td:nth-child(2) {
            width: 24%;
        }

        .products-table th:nth-child(3),
        .products-table td:nth-child(3) {
            width: 19%;
        }

        .products-table th:nth-child(4),
        .products-table td:nth-child(4) {
            width: 15%;
        }

        .products-table th:nth-child(5),
        .products-table td:nth-child(5) {
            width: 15%;
        }

        .products-table th:last-child,
        .products-table td:last-child {
            width: 145px;
        }

        .product-image {
            display: block;
            width: 72px;
            height: 72px;
            border-radius: 14px;
            object-fit: cover;
            background: var(--soft, #292522);
            border: 1px solid var(--border, #39332f);
        }

        .product-image-placeholder {
            display: grid;
            place-items: center;
            color: var(--sub, #a59b91);
            font-size: 20px;
        }

        .product-name {
            font-size: 14px;
            font-weight: 800;
            line-height: 1.9;
            overflow-wrap: anywhere;
        }

        .product-id {
            margin-top: 4px;
            color: var(--sub, #a59b91);
            font-size: 11px;
        }

        .product-category {
            color: var(--sub, #a59b91);
            font-size: 12px;
            line-height: 1.8;
            overflow-wrap: anywhere;
        }

        .product-status {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            border-radius: 999px;
            padding: 7px 10px;
            font-size: 11px;
            font-weight: 700;
            white-space: nowrap;
        }

        .product-status::before {
            content: "";
            width: 7px;
            height: 7px;
            flex-shrink: 0;
            border-radius: 50%;
            background: currentColor;
        }

        .product-status.available {
            color: #56c995;
            background: rgba(22, 121, 75, .15);
            border: 1px solid rgba(86, 201, 149, .14);
        }

        .product-status.off-season {
            color: #d8ad62;
            background: rgba(153, 101, 21, .15);
            border: 1px solid rgba(216, 173, 98, .14);
        }

        .product-visibility {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: var(--sub, #a59b91);
            font-size: 12px;
            white-space: nowrap;
        }

        .product-visibility.visible {
            color: #56c995;
        }

        .product-visibility.hidden {
            color: #d8ad62;
        }

        /* منوی عملیات */
        .product-actions {
            position: relative;
            display: inline-block;
        }

        .product-actions summary {
            list-style: none;
            cursor: pointer;
            user-select: none;
        }

        .product-actions summary::-webkit-details-marker {
            display: none;
        }

        .product-actions-trigger {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-width: 104px;
            padding: 10px 12px;
            border: 1px solid var(--border, #39332f);
            border-radius: 10px;
            background: var(--card, #25211e);
            color: inherit;
            font: inherit;
            font-size: 12px;
            transition: background .2s, border-color .2s, color .2s;
        }

        .product-actions-trigger:hover,
        .product-actions[open] .product-actions-trigger {
            background: color-mix(
                in srgb,
                var(--primary, #8b5e3c) 13%,
                var(--card, #25211e)
            );
            border-color: var(--primary, #8b5e3c);
        }

        .product-actions-trigger .dots {
            font-size: 20px;
            line-height: 12px;
        }

        /*
         * منو هنگام بازشدن به body منتقل می‌شود.
         * در نتیجه overflow جدول یا کارت، منو را قطع نمی‌کند.
         */
        .product-actions-menu {
            position: fixed;
            z-index: 999999;
            display: none;
            width: 190px;
            max-width: calc(100vw - 20px);
            padding: 6px;
            border: 1px solid var(--border, #39332f);
            border-radius: 13px;
            background: var(--card, #25211e);
            color: var(--text, #e5e0d8);
            box-shadow: 0 14px 40px rgba(0, 0, 0, .3);
            direction: rtl;
        }

        .product-actions-menu a,
        .product-actions-menu button {
            display: flex;
            align-items: center;
            width: 100%;
            gap: 10px;
            padding: 11px 10px;
            border: 0;
            border-radius: 9px;
            background: transparent;
            color: inherit;
            font: inherit;
            font-size: 12px;
            text-align: right;
            text-decoration: none;
            cursor: pointer;
            white-space: nowrap;
            transition: background .18s ease, color .18s ease;
        }

        .product-actions-menu a:hover,
        .product-actions-menu button:hover {
            background: color-mix(
                in srgb,
                var(--primary, #8b5e3c) 14%,
                transparent
            );
        }

        .product-actions-menu .danger-action {
            color: #e7776c;
        }

        .product-actions-menu .danger-action:hover {
            background: rgba(192, 57, 43, .13);
        }

        .products-empty {
            padding: 55px 16px !important;
            color: var(--sub, #a59b91);
            text-align: center !important;
        }

        .products-empty-icon {
            margin-bottom: 12px;
            font-size: 36px;
        }

        .products-empty-title {
            color: var(--text, #e5e0d8);
            font-size: 15px;
            font-weight: 800;
        }

        .products-empty-description {
            margin-top: 7px;
            font-size: 12px;
        }

        /* صفحه‌بندی */
        .products-pagination {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            flex-wrap: wrap;
            padding: 20px 24px;
            border-top: 1px solid var(--border, #39332f);
        }

        .products-pagination-info {
            color: var(--sub, #a59b91);
            font-size: 12px;
        }

        .products-pagination-info strong {
            color: var(--text, #e5e0d8);
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
            min-width: 38px;
            height: 38px;
            padding: 0 10px;
            border: 1px solid var(--border, #39332f);
            border-radius: 10px;
            background: var(--card, #25211e);
            color: var(--text, #e5e0d8);
            font-size: 12px;
            text-decoration: none;
            transition: background .2s ease, border-color .2s ease, color .2s ease;
        }

        .pagination-number:hover,
        .pagination-arrow:not(.disabled):hover {
            border-color: var(--primary, #8b5e3c);
            background: color-mix(
                in srgb,
                var(--primary, #8b5e3c) 13%,
                var(--card, #25211e)
            );
            color: var(--text, #e5e0d8);
        }

        .pagination-number.active {
            border-color: var(--primary, #8b5e3c);
            background: var(--primary, #8b5e3c);
            color: #fff;
            font-weight: 800;
        }

        .pagination-arrow.disabled {
            opacity: .4;
            cursor: not-allowed;
        }

        .pagination-dots {
            padding: 0 4px;
            color: var(--sub, #a59b91);
        }

        /* مودال حذف */
        .delete-modal {
            width: min(440px, calc(100% - 28px));
            max-width: 440px;
            padding: 0;
            border: 1px solid var(--border, #39332f);
            border-radius: 18px;
            background: var(--card, #25211e);
            color: var(--text, #e5e0d8);
            box-shadow: 0 25px 80px rgba(0, 0, 0, .4);
        }

        .delete-modal::backdrop {
            background: rgba(0, 0, 0, .68);
            backdrop-filter: blur(3px);
        }

        .delete-modal-content {
            padding: 24px;
        }

        .delete-modal-icon {
            display: grid;
            place-items: center;
            width: 48px;
            height: 48px;
            margin-bottom: 16px;
            border-radius: 14px;
            background: rgba(192, 57, 43, .14);
            color: #e7776c;
            font-size: 23px;
        }

        .delete-modal h3 {
            margin: 0 0 8px;
            font-size: 18px;
        }

        .delete-modal p {
            margin: 0;
            color: var(--sub, #a59b91);
            font-size: 13px;
            line-height: 2;
        }

        .delete-modal-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 24px;
        }

        .delete-modal-actions button {
            min-width: 100px;
            cursor: pointer;
        }

        .delete-modal-actions #cancelDeleteProduct {
            background: var(--soft, #302a26);
            color: var(--text, #e5e0d8);
            border: 1px solid var(--border, #39332f);
        }

        .delete-modal-actions #cancelDeleteProduct:hover {
            background: color-mix(
                in srgb,
                var(--primary, #8b5e3c) 13%,
                var(--card, #25211e)
            );
            border-color: var(--primary, #8b5e3c);
        }

        @media (max-width: 900px) {
            .products-table th:nth-child(3),
            .products-table td:nth-child(3),
            .products-table th:nth-child(5),
            .products-table td:nth-child(5) {
                display: none;
            }

            .products-table th:nth-child(2),
            .products-table td:nth-child(2) {
                width: auto;
            }

            .products-table th:nth-child(4),
            .products-table td:nth-child(4) {
                width: 125px;
            }

            .products-table th:last-child,
            .products-table td:last-child {
                width: 125px;
            }
        }

        @media (max-width: 560px) {
            .products-toolbar {
                align-items: stretch;
            }

            .products-toolbar-actions {
                width: 100%;
            }

            .products-toolbar-actions .btn {
                flex: 1;
                text-align: center;
            }

            .products-table th,
            .products-table td {
                padding: 14px 8px;
            }

            .products-table tbody tr {
                height: 86px;
            }

            .products-table th:first-child,
            .products-table td:first-child {
                width: 62px;
            }

            .product-image {
                width: 46px;
                height: 46px;
                border-radius: 10px;
            }

            .product-name {
                font-size: 12px;
            }

            .products-table th:nth-child(4),
            .products-table td:nth-child(4) {
                width: 98px;
            }

            .products-table th:last-child,
            .products-table td:last-child {
                width: 95px;
            }

            .product-actions-trigger {
                min-width: 0;
                padding: 8px;
                gap: 4px;
            }

            .products-pagination {
                align-items: stretch;
                padding: 16px;
            }

            .products-pagination-info {
                width: 100%;
                text-align: center;
            }

            .products-pagination-links {
                width: 100%;
            }

            .pagination-number,
            .pagination-arrow {
                min-width: 32px;
                height: 34px;
                padding: 0 7px;
            }

            .delete-modal-content {
                padding: 20px;
            }
        }
    </style>

    <div class="products-page">
        <div class="card">
            <div class="card-h products-toolbar">
                <div>
                    <div style="font-weight:800;">لیست محصولات</div>
                    <div style="margin-top:5px;color:var(--sub,#777);font-size:12px;">
                        مدیریت، ویرایش و کنترل نمایش محصولات
                    </div>
                </div>

                <div class="products-toolbar-actions">
                    <a class="btn" href="{{ route('admin.products.trash') }}">
                        زباله‌دان
                    </a>

                    <a class="btn p" href="{{ route('admin.products.create') }}">
                        + افزودن محصول
                    </a>
                </div>
            </div>

            <div class="card-b products-table-wrap">
                <table class="table products-table">
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

                            $isAvailable = $p->status === 'available';
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
                                    <div class="product-image product-image-placeholder">
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
                                    {{ $categoryNames[$p->category] ?? $p->category }}
                                </span>
                            </td>

                            <td>
                                <span class="product-status {{ $isAvailable ? 'available' : 'off-season' }}">
                                    {{ $isAvailable ? 'موجود' : 'خارج از فصل' }}
                                </span>
                            </td>

                            <td>
                                <span class="product-visibility {{ $p->hidden ? 'hidden' : 'visible' }}">
                                    {{ $p->hidden ? 'مخفی' : 'نمایش داده شده' }}
                                </span>
                            </td>

                            <td>
                                <details class="product-actions">
                                    <summary class="product-actions-trigger">
                                        عملیات
                                        <span class="dots">⋯</span>
                                    </summary>

                                    <div class="product-actions-menu">
                                        <a href="{{ route('admin.products.edit', $p) }}">
                                            <span>✎</span>
                                            ویرایش محصول
                                        </a>

                                        <button
                                            type="button"
                                            class="danger-action js-open-delete-modal"
                                            data-delete-url="{{ route('admin.products.destroy', $p) }}"
                                            data-product-name="{{ $productName }}"
                                        >
                                            <span>⌫</span>
                                            حذف محصول
                                        </button>
                                    </div>
                                </details>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="products-empty">
                                <div class="products-empty-icon">📦</div>
                                <div class="products-empty-title">
                                    هنوز محصولی ثبت نشده است
                                </div>
                                <div class="products-empty-description">
                                    برای شروع، اولین محصول را اضافه کن.
                                </div>
                                <div style="margin-top:16px;">
                                    <a class="btn p" href="{{ route('admin.products.create') }}">
                                        + افزودن محصول
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
                            <span class="pagination-arrow disabled" aria-disabled="true">قبلی</span>
                        @else
                            <a class="pagination-arrow" href="{{ $products->previousPageUrl() }}">قبلی</a>
                        @endif

                        @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                            @if (
                                $page === 1 ||
                                $page === $products->lastPage() ||
                                abs($page - $products->currentPage()) <= 1
                            )
                                @if ($page === $products->currentPage())
                                    <span class="pagination-number active" aria-current="page">{{ $page }}</span>
                                @else
                                    <a class="pagination-number" href="{{ $url }}">{{ $page }}</a>
                                @endif
                            @elseif (
                                $page === 2 && $products->currentPage() > 3
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
                            <a class="pagination-arrow" href="{{ $products->nextPageUrl() }}">بعدی</a>
                        @else
                            <span class="pagination-arrow disabled" aria-disabled="true">بعدی</span>
                        @endif
                    </nav>
                </div>
            @endif
        </div>
    </div>

    {{-- مودال تأیید حذف --}}
    <dialog class="delete-modal" id="deleteProductModal">
        <div class="delete-modal-content">
            <div class="delete-modal-icon">!</div>

            <h3>حذف محصول</h3>

            <p>
                مطمئنی می‌خواهی محصول
                <strong id="deleteProductName"></strong>
                را حذف کنی؟
                <br>
                محصول به زباله‌دان منتقل می‌شود و حذف دائمی نیست.
            </p>

            <form id="deleteProductForm" method="POST">
                @csrf
                @method('DELETE')

                <div class="delete-modal-actions">
                    <button type="button" class="btn" id="cancelDeleteProduct">
                        انصراف
                    </button>

                    <button type="submit" class="btn dn">
                        بله، حذف شود
                    </button>
                </div>
            </form>
        </div>
    </dialog>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const modal = document.getElementById('deleteProductModal');
            const deleteForm = document.getElementById('deleteProductForm');
            const productName = document.getElementById('deleteProductName');
            const cancelButton = document.getElementById('cancelDeleteProduct');

            let activeDetails = null;
            let activeMenu = null;
            let activeTrigger = null;
            let menuPlaceholder = null;

            function closeActionsMenu() {
                if (!activeDetails) return;

                const details = activeDetails;
                const menu = activeMenu;

                details.open = false;

                if (menu && menuPlaceholder && menuPlaceholder.parentNode) {
                    menuPlaceholder.parentNode.insertBefore(menu, menuPlaceholder);
                    menuPlaceholder.remove();
                }

                if (menu) {
                    menu.style.display = '';
                    menu.style.top = '';
                    menu.style.left = '';
                    menu.style.right = '';
                }

                activeDetails = null;
                activeMenu = null;
                activeTrigger = null;
                menuPlaceholder = null;
            }

            function positionActionsMenu() {
                if (!activeMenu || !activeTrigger) return;

                const triggerRect = activeTrigger.getBoundingClientRect();
                const menuRect = activeMenu.getBoundingClientRect();
                const margin = 10;
                const gap = 6;

                let left = triggerRect.left;
                let top = triggerRect.bottom + gap;

                if (left + menuRect.width > window.innerWidth - margin) {
                    left = window.innerWidth - menuRect.width - margin;
                }

                left = Math.max(margin, left);

                const availableBelow = window.innerHeight - triggerRect.bottom - margin;
                const availableAbove = triggerRect.top - margin;

                if (
                    menuRect.height > availableBelow &&
                    availableAbove > availableBelow
                ) {
                    top = triggerRect.top - menuRect.height - gap;
                }

                top = Math.max(
                    margin,
                    Math.min(top, window.innerHeight - menuRect.height - margin)
                );

                activeMenu.style.left = left + 'px';
                activeMenu.style.top = top + 'px';
                activeMenu.style.right = 'auto';
            }

            document.querySelectorAll('.product-actions').forEach(function (details) {
                const trigger = details.querySelector('summary');
                const menu = details.querySelector('.product-actions-menu');

                details.addEventListener('toggle', function () {
                    if (!details.open) {
                        if (activeDetails === details) {
                            closeActionsMenu();
                        }
                        return;
                    }

                    closeActionsMenu();

                    activeDetails = details;
                    activeMenu = menu;
                    activeTrigger = trigger;

                    menuPlaceholder = document.createComment('product-actions-menu');
                    menu.parentNode.insertBefore(menuPlaceholder, menu);
                    document.body.appendChild(menu);

                    menu.style.display = 'block';
                    positionActionsMenu();
                });
            });

            document.addEventListener('click', function (event) {
                if (!activeDetails) return;

                if (
                    activeDetails.contains(event.target) ||
                    (activeMenu && activeMenu.contains(event.target))
                ) {
                    return;
                }

                closeActionsMenu();
            });

            document.addEventListener('keydown', function (event) {
                if (event.key === 'Escape') {
                    closeActionsMenu();
                }
            });

            window.addEventListener('resize', closeActionsMenu);
            window.addEventListener('scroll', closeActionsMenu, true);

            document.querySelectorAll('.js-open-delete-modal').forEach(function (button) {
                button.addEventListener('click', function () {
                    closeActionsMenu();

                    deleteForm.action = button.dataset.deleteUrl;
                    productName.textContent =
                        button.dataset.productName || 'این محصول';

                    if (typeof modal.showModal === 'function') {
                        modal.showModal();
                    } else {
                        modal.setAttribute('open', 'open');
                    }
                });
            });

            cancelButton.addEventListener('click', function () {
                if (typeof modal.close === 'function') {
                    modal.close();
                } else {
                    modal.removeAttribute('open');
                }
            });

            modal.addEventListener('click', function (event) {
                if (event.target === modal) {
                    if (typeof modal.close === 'function') {
                        modal.close();
                    } else {
                        modal.removeAttribute('open');
                    }
                }
            });
        });
    </script>
@endsection
