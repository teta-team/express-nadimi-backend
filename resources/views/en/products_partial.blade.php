@php
    $lang = 'en';
@endphp

@forelse ($products as $p)
    @php
        $pname = is_array($p->name)
            ? ($p->name[$lang] ?? $p->name['en'] ?? $p->name['fa'] ?? $p->slug)
            : ($p->name ?? $p->slug);

        $pcat = $p->category ?? '';

        $months = is_array($p->months) && count($p->months) === 12
            ? array_values($p->months)
            : array_fill(0, 12, false);

        $months = array_map(
            fn ($value) => filter_var($value, FILTER_VALIDATE_BOOLEAN),
            $months
        );

        $img = $p->image ?: asset('assets/images/products/tomato.jpg');

        $status = $p->status === 'off_season'
            ? 'Out of season'
            : 'Available';

        $statusClass = $p->status === 'off_season'
            ? 'is-off'
            : 'is-available';

        $activeMonths = count(array_filter($months));

        $summary = is_array($p->summary)
            ? ($p->summary[$lang] ?? '')
            : ($p->summary ?? '');

        $monthNames = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December',
        ];
    @endphp

    <div
        data-product
        data-category="{{ $pcat }}"
        data-name="{{ mb_strtolower($pname, 'UTF-8') }}"
        data-months="{{ implode(',', array_map(
            fn ($on) => $on ? '1' : '0',
            $months
        )) }}"
    >
        <article class="pcard">
            <div class="pcard-media">
                <img
                    src="{{ $img }}"
                    alt="{{ $pname }}"
                    width="480"
                    height="373"
                    loading="lazy"
                    decoding="async"
                >

                <span class="pcard-go" aria-hidden="true">
                    <svg class="ic flip">
                        <use href="#i-arrow" />
                    </svg>
                </span>
            </div>

            <div class="pcard-body">
                <div class="pcard-top">
                    <h3 class="pcard-title">
                        <a href="{{ route('product.show', [
                            'lang' => 'en',
                            'slug' => $p->slug,
                        ]) }}">
                            {{ $pname }}
                        </a>
                    </h3>

                    <span class="dot-badge {{ $statusClass }}">
                        {{ $status }}
                    </span>
                </div>

                <p class="pcard-text">
                    {{ $summary }}
                </p>

                <div class="pcard-months" aria-label="Seasonality">
                    @foreach ($months as $i => $available)
                        <span
                            class="month-dot {{ $available ? 'is-active' : '' }}"
                            title="{{ $monthNames[$i] }}: {{ $available ? 'Available' : 'Out of season' }}"
                        >
                            {{ substr($monthNames[$i], 0, 1) }}
                        </span>
                    @endforeach
                </div>
            </div>
        </article>
    </div>
@empty
    <div class="pgrid-empty">
        <p>No products found matching your criteria.</p>
    </div>
@endforelse
