{{--
    JSON-LD graph: Organization (+ WebSite on the home page) (+ BreadcrumbList).

    @include('partials.seo-schema', [
        'lang'    => 'fa',
        'website' => true,                       // optional, home page only
        'crumbs'  => [['خانه', url], ['محصولات', url]],   // optional
    ])

    NOTE: no e-mail is published in the structured data on purpose. The site
    currently uses *@nadimi.example placeholders; add a real address here
    ('email' => ...) once it exists.
--}}
@php
    $schemaLang = $lang ?? 'en';
    $schemaBrand = [
        'fa' => 'اکسپرس ندیمی',
        'en' => 'Nadimi International',
        'ar' => 'إكسبرس نديمي',
    ];
    $orgId     = url('/') . '#organization';
    $websiteId = url('/') . '#website';

    $graph = [[
        '@type'         => 'Organization',
        '@id'           => $orgId,
        'name'          => 'Nadimi International',
        'legalName'     => 'Nadimi International LLC',
        'alternateName' => array_values(array_unique(array_filter([$schemaBrand[$schemaLang] ?? null, 'Nadimi International']))),
        'url'           => url('/'),
        'logo'          => asset('assets/images/logo/nadimi-logo-512.png'),
        'telephone'     => '+968 9948 2094',
        'address'       => [
            ['@type' => 'PostalAddress', 'addressLocality' => 'Tabriz', 'addressCountry' => 'IR'],
            ['@type' => 'PostalAddress', 'addressLocality' => 'Muscat', 'addressCountry' => 'OM'],
        ],
    ]];

    if (!empty($website)) {
        $graph[] = [
            '@type'      => 'WebSite',
            '@id'        => $websiteId,
            'url'        => url('/'),
            'name'       => 'Nadimi International',
            'inLanguage' => ['fa', 'en', 'ar'],
            'publisher'  => ['@id' => $orgId],
        ];
    }

    if (!empty($crumbs)) {
        $items = [];
        foreach (array_values($crumbs) as $i => $crumb) {
            $items[] = [
                '@type'    => 'ListItem',
                'position' => $i + 1,
                'name'     => $crumb[0],
                'item'     => $crumb[1],
            ];
        }
        $graph[] = ['@type' => 'BreadcrumbList', 'itemListElement' => $items];
    }

    $schema = ['@context' => 'https://schema.org', '@graph' => $graph];
@endphp
    <script type="application/ld+json">{!! json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}</script>
