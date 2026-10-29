@extends('admin.layouts.app')

@section('title', 'زباله‌دان درخواست‌ها')
@section('page-title', 'زباله‌دان درخواست‌ها')
@section('page-subtitle', 'بازیابی یا حذف دائمی درخواست‌ها')

@section('content')
    <style>
        .request-trash{width:100%;min-width:0;color:var(--text,#e5e0d8)}
        .request-trash-toolbar{display:flex;justify-content:space-between;align-items:center;gap:12px;flex-wrap:wrap}
        .request-trash-wrap{width:100%;overflow-x:auto}
        .request-trash-table{width:100%;min-width:650px;border-collapse:separate;border-spacing:0}
        .request-trash-table th,.request-trash-table td{padding:16px 12px;text-align:right;vertical-align:middle;border-bottom:1px solid var(--border,#39332f)}
        .request-trash-table th{background:var(--soft,#292522);color:var(--sub,#a59b91);font-size:12px;white-space:nowrap}
        .request-trash-table tbody tr:hover{background:color-mix(in srgb,var(--primary,#8b5e3c) 8%,transparent)}
        .request-trash-name{font-size:13px;font-weight:800;line-height:1.9;overflow-wrap:anywhere}
        .request-trash-meta{font-size:11px;color:var(--sub,#a59b91);margin-top:5px;line-height:1.9;overflow-wrap:anywhere}
        .request-trash-type{display:inline-block;padding:6px 9px;border:1px solid var(--border,#39332f);border-radius:999px;font-size:11px}
        .request-trash-actions{display:flex;gap:7px;flex-wrap:wrap}
        .request-trash-action{padding:8px 11px;border:1px solid var(--border,#39332f);border-radius:9px;background:var(--card,#25211e);color:var(--text,#e5e0d8);font:inherit;font-size:11px;cursor:pointer}
        .request-trash-action.restore{color:#56c995}
        .request-trash-action.delete{color:#e7776c}
        .request-trash-action:hover{border-color:var(--primary,#8b5e3c)}
        .request-trash-empty{text-align:center!important;padding:48px 16px!important;color:var(--sub,#a59b91)}
        .request-trash-empty strong{display:block;color:var(--text,#e5e0d8);font-size:14px;margin:10px 0}
        .request-trash-alert{padding:12px 15px;margin-bottom:15px;border:1px solid rgba(86,201,149,.25);border-radius:10px;background:rgba(22,121,75,.12);color:#56c995;font-size:13px}
        .request-trash-modal{width:min(440px,calc(100% - 28px));padding:0;border:1px solid var(--border,#39332f);border-radius:16px;background:var(--card,#25211e);color:var(--text,#e5e0d8);box-shadow:0 24px 70px rgba(0,0,0,.35)}
        .request-trash-modal::backdrop{background:rgba(0,0,0,.65);backdrop-filter:blur(3px)}
        .request-trash-modal-body{padding:24px}
        .request-trash-modal h3{margin:0 0 10px;font-size:17px}
        .request-trash-modal p{font-size:13px;color:var(--sub,#a59b91);line-height:2}
        .request-trash-modal-actions{display:flex;justify-content:flex-end;gap:9px;flex-wrap:wrap;margin-top:20px}
        @media(max-width:560px){.request-trash-modal-body{padding:19px}.request-trash-actions{flex-direction:column}.request-trash-action{width:100%}}
    </style>

    <div class="request-trash">
        @if(session('success'))
            <div class="request-trash-alert">{{ session('success') }}</div>
        @endif

        <div class="card">
            <div class="card-h request-trash-toolbar">
                <div>
                    <div style="font-weight:800">درخواست‌های حذف‌شده</div>
                    <div style="margin-top:5px;color:var(--sub,#a59b91);font-size:12px">
                        درخواست‌ها را بازیابی کن یا در صورت اطمینان برای همیشه حذف کن.
                    </div>
                </div>

                <a class="btn" href="{{ route('admin.Request') }}">بازگشت به درخواست‌ها</a>
            </div>

            <div class="request-trash-wrap">
                <table class="table request-trash-table">
                    <thead>
                    <tr>
                        <th>درخواست‌دهنده</th>
                        <th>نوع درخواست</th>
                        <th>تاریخ ثبت</th>
                        <th>تاریخ حذف</th>
                        <th>عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($requests as $item)
                        <tr>
                            <td>
                                <div class="request-trash-name">{{ $item->request_name ?: 'بدون نام' }}</div>
                                <div class="request-trash-meta">شناسه: {{ $item->id }}</div>
                            </td>
                            <td>
                                <span class="request-trash-type">{{ $item->request_label }}</span>
                            </td>
                            <td>{{ $item->created_at?->format('Y/m/d H:i') ?? '—' }}</td>
                            <td>{{ $item->deleted_at?->format('Y/m/d H:i') ?? '—' }}</td>
                            <td>
                                <div class="request-trash-actions">
                                    <button type="button"
                                            class="request-trash-action restore js-trash-action"
                                            data-action="{{ route('admin.Request.restore', [$item->request_type, $item->id]) }}"
                                            data-kind="restore"
                                            data-name="{{ $item->request_name }}">
                                        ↶ بازیابی
                                    </button>

                                    <button type="button"
                                            class="request-trash-action delete js-trash-action"
                                            data-action="{{ route('admin.Request.forceDelete', [$item->request_type, $item->id]) }}"
                                            data-kind="delete"
                                            data-name="{{ $item->request_name }}">
                                        × حذف دائمی
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="request-trash-empty">
                                <div style="font-size:34px">🗑</div>
                                <strong>زباله‌دان خالی است</strong>
                                در حال حاضر درخواست حذف‌شده‌ای وجود ندارد.
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <dialog class="request-trash-modal" id="requestTrashModal">
        <div class="request-trash-modal-body">
            <h3 id="requestTrashTitle">تأیید عملیات</h3>
            <p id="requestTrashMessage"></p>

            <form id="requestTrashForm" method="POST">
                @csrf
                <input type="hidden" name="_method" id="requestTrashMethod" value="DELETE">

                <div class="request-trash-modal-actions">
                    <button class="btn" type="button" id="requestTrashCancel">انصراف</button>
                    <button class="btn dn" type="submit" id="requestTrashConfirm">تأیید</button>
                </div>
            </form>
        </div>
    </dialog>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const modal = document.getElementById('requestTrashModal');
            const form = document.getElementById('requestTrashForm');
            const method = document.getElementById('requestTrashMethod');
            const title = document.getElementById('requestTrashTitle');
            const message = document.getElementById('requestTrashMessage');
            const confirmButton = document.getElementById('requestTrashConfirm');
            const cancelButton = document.getElementById('requestTrashCancel');

            document.querySelectorAll('.js-trash-action').forEach(function (button) {
                button.addEventListener('click', function () {
                    const kind = button.dataset.kind;
                    const name = button.dataset.name || 'این درخواست';

                    if (!['restore', 'delete'].includes(kind)) return;

                    form.action = button.dataset.action;

                    if (kind === 'restore') {
                        method.disabled = true;
                        title.textContent = 'بازیابی درخواست';
                        message.textContent = `درخواست «${name}» به فهرست اصلی برگردد؟`;
                        confirmButton.textContent = 'بله، بازیابی شود';
                        confirmButton.classList.remove('dn');
                    } else {
                        method.value = 'DELETE';
                        method.disabled = false;
                        title.textContent = 'حذف دائمی درخواست';
                        message.textContent = `درخواست «${name}» برای همیشه حذف شود؟ این عملیات قابل بازگشت نیست.`;
                        confirmButton.textContent = 'حذف دائمی';
                        confirmButton.classList.add('dn');
                    }

                    if (typeof modal.showModal === 'function') modal.showModal();
                });
            });

            cancelButton.addEventListener('click', function () {
                modal.close();
            });

            modal.addEventListener('click', function (event) {
                if (event.target === modal) modal.close();
            });
        });
    </script>
@endsection
