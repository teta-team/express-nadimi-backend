@php
    $monthNames = [
        1 => 'فروردین',
        2 => 'اردیبهشت',
        3 => 'خرداد',
        4 => 'تیر',
        5 => 'مرداد',
        6 => 'شهریور',
        7 => 'مهر',
        8 => 'آبان',
        9 => 'آذر',
        10 => 'دی',
        11 => 'بهمن',
        12 => 'اسفند',
    ];

    /*
     * در فرم ساخت، ماه‌ها به شکل [1, 2, 3] هستند.
     * در دیتابیس فعلی، ماه‌ها معمولاً به شکل آرایه بولی
     * با اندیس‌های 0 تا 11 ذخیره می‌شوند.
     */
    if (old('months_submitted') !== null) {
        $selectedMonths = collect(old('months', []))
            ->map(fn ($month) => (int) $month)
            ->filter(fn ($month) => $month >= 1 && $month <= 12)
            ->values()
            ->all();
    } else {
        $selectedMonths = [];

        foreach (($productMonths ?? []) as $index => $active) {
            if (!$active) {
                continue;
            }

            if (is_numeric($index)) {
                $monthNumber = (int) $index + 1;

                if ($monthNumber >= 1 && $monthNumber <= 12) {
                    $selectedMonths[] = $monthNumber;
                }
            }
        }
    }
@endphp

<style>
    .harvest-section {
        margin-top: 28px;
        padding: 22px;
        border: 1px solid var(--border, #e8e5df);
        border-radius: 18px;
        background: var(--card, #fff);
    }

    .harvest-header {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 16px;
        margin-bottom: 18px;
        flex-wrap: wrap;
    }

    .harvest-title {
        margin: 0;
        font-size: 16px;
        font-weight: 750;
    }

    .harvest-description {
        margin: 7px 0 0;
        color: var(--sub, #777);
        font-size: 13px;
        line-height: 1.9;
    }

    .harvest-counter {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 7px 11px;
        border-radius: 999px;
        background: #edf7ef;
        color: #287746;
        font-size: 12px;
        font-weight: 700;
        white-space: nowrap;
    }

    .harvest-tools {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
        margin-bottom: 14px;
    }

    .harvest-tool {
        padding: 7px 11px;
        border: 1px solid var(--border, #ddd);
        border-radius: 9px;
        background: var(--card, #fff);
        color: inherit;
        font: inherit;
        font-size: 12px;
        cursor: pointer;
        transition: background .2s, border-color .2s;
    }

    .harvest-tool:hover {
        border-color: #b6a27b;
        background: #faf7f0;
    }

    .harvest-month-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 10px;
    }

    .harvest-month {
        position: relative;
        display: flex;
        align-items: center;
        gap: 11px;
        min-height: 66px;
        padding: 12px;
        border: 1px solid var(--border, #e4e4e4);
        border-radius: 13px;
        background: var(--card, #fff);
        cursor: pointer;
        transition: border-color .18s, background .18s, box-shadow .18s;
    }

    .harvest-month:hover {
        border-color: #c6a875;
        background: #fdfbf7;
    }

    .harvest-month:has(input:checked) {
        border-color: #718768;
        background: #f0f5ed;
        box-shadow: inset 0 0 0 1px #718768;
    }

    .harvest-month input {
        width: 17px;
        height: 17px;
        flex: 0 0 17px;
        margin: 0;
        accent-color: #5d7655;
        cursor: pointer;
    }

    .harvest-month-text {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .harvest-month-name {
        font-size: 13px;
        font-weight: 650;
    }

    .harvest-month-number {
        color: var(--sub, #888);
        font-size: 11px;
    }

    .harvest-month:has(input:checked) .harvest-month-name {
        color: #365b34;
    }

    .harvest-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        margin-top: 16px;
        padding-top: 14px;
        border-top: 1px solid var(--border, #eee);
        color: var(--sub, #777);
        font-size: 12px;
        line-height: 1.8;
    }

    @media (max-width: 760px) {
        .harvest-month-grid {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }
    }

    @media (max-width: 520px) {
        .harvest-section {
            padding: 15px;
        }

        .harvest-month-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 8px;
        }

        .harvest-month {
            min-height: 58px;
            padding: 10px;
        }

        .harvest-footer {
            align-items: flex-start;
            flex-direction: column;
        }
    }
</style>

<section class="harvest-section" aria-labelledby="harvest-title">
    <div class="harvest-header">
        <div>
            <h3 class="harvest-title" id="harvest-title">
                ماه‌های موجود بودن محصول
            </h3>

            <p class="harvest-description">
                ماه‌هایی را انتخاب کن که این محصول معمولاً در آن‌ها در دسترس است.
                <br>
                این اطلاعات برای نمایش تقویم دسترسی محصول در سایت استفاده می‌شود.
            </p>
        </div>

        <span class="harvest-counter" aria-live="polite">
            <span id="harvestSelectedCount">{{ count($selectedMonths) }}</span>
            از ۱۲ ماه
        </span>
    </div>

    <input type="hidden" name="months_submitted" value="1">

    <div class="harvest-tools">
        <button type="button" class="harvest-tool" id="harvestSelectAll">
            انتخاب همه ماه‌ها
        </button>

        <button type="button" class="harvest-tool" id="harvestClearAll">
            پاک کردن انتخاب
        </button>
    </div>

    <div class="harvest-month-grid" id="harvestMonthGrid">
        @foreach($monthNames as $number => $monthName)
            <label class="harvest-month">
                <input
                    type="checkbox"
                    name="months[]"
                    value="{{ $number }}"
                    @checked(in_array($number, $selectedMonths, true))
                >

                <span class="harvest-month-text">
                    <span class="harvest-month-name">{{ $monthName }}</span>
                    <span class="harvest-month-number">
                        ماه {{ str_pad($number, 2, '0', STR_PAD_LEFT) }}
                    </span>
                </span>
            </label>
        @endforeach
    </div>

    <div class="harvest-footer">
        <span id="harvestSelectionSummary">
            @if(count($selectedMonths))
                {{ count($selectedMonths) }}ماه برای موجود بودن انتخاب شده است .
            @else
                هنوز ماهی انتخاب نشده است.
            @endif
        </span>

        <span>می‌توانی چند ماه یا تمام سال را انتخاب کنی.</span>
    </div>
</section>

<script>
    (function () {
        const grid = document.getElementById('harvestMonthGrid');

        if (!grid || grid.dataset.initialized === 'true') {
            return;
        }

        grid.dataset.initialized = 'true';

        const checkboxes = Array.from(
            grid.querySelectorAll('input[name="months[]"]')
        );

        const countElement = document.getElementById('harvestSelectedCount');
        const summaryElement = document.getElementById('harvestSelectionSummary');
        const selectAllButton = document.getElementById('harvestSelectAll');
        const clearAllButton = document.getElementById('harvestClearAll');

        function updateSummary() {
            const selectedCount = checkboxes.filter(
                checkbox => checkbox.checked
            ).length;

            countElement.textContent = selectedCount;

            if (selectedCount === 0) {
                summaryElement.textContent = 'هنوز ماهی انتخاب نشده است.';
            } else {
                summaryElement.textContent =
                    selectedCount + ' ماه برای موجود بودن انتخاب شده است.';
            }
        }

        selectAllButton.addEventListener('click', function () {
            checkboxes.forEach(checkbox => {
                checkbox.checked = true;
            });

            updateSummary();
        });

        clearAllButton.addEventListener('click', function () {
            checkboxes.forEach(checkbox => {
                checkbox.checked = false;
            });

            updateSummary();
        });

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', updateSummary);
        });

        updateSummary();
    })();
</script>
