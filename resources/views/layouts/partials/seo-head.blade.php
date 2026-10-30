{{--
    Shared SEO head (title, description, robots, canonical, Open Graph, Twitter).

    Usage (inside <head> of every public master layout):
        @include('layouts.partials.seo-head', ['lang' => 'fa'])

    Pages override values with sections:
        title, description, canonical, robots, og_type, og_image, og_title,
        og_description
    Everything is normalised once here (entities decoded, whitespace
    collapsed, then escaped exactly once) so that titles such as
    "Fruit &amp; Vegetables" are never double-encoded.
--}}
@php
    $seoDefaults = [
        'fa' => [
            'locale'   => 'fa_IR',
            'site'     => 'اکسپرس ندیمی',
            'title'    => 'اکسپرس ندیمی | صادرات میوه و صیفی‌جات تازه ایران',
            'desc'     => 'اکسپرس ندیمی با بیش از ۱۵ سال تجربه، میوه و سبزیجات تازه ایران را به عمان و منطقه صادر می‌کند. قیمت روز و موجودی را از ما بپرسید.',
            'image_alt'=> 'اکسپرس ندیمی؛ صادرکننده میوه و سبزیجات تازه ایرانی',
        ],
        'en' => [
            'locale'   => 'en_US',
            'site'     => 'Nadimi International',
            'title'    => 'Nadimi International | Fresh Iranian Fruit & Vegetable Exporter',
            'desc'     => 'Nadimi International exports fresh Iranian fruit and vegetables to Oman and the region, with 15+ years of experience. Ask us for today\'s price and availability.',
            'image_alt'=> 'Nadimi International - exporter of fresh Iranian fruit and vegetables',
        ],
        'ar' => [
            'locale'   => 'ar_AR',
            'site'     => 'إكسبرس نديمي',
            'title'    => 'إكسبرس نديمي | تصدير الفواكه والخضروات الإيرانية الطازجة',
            'desc'     => 'تصدّر إكسبرس نديمي الفواكه والخضروات الإيرانية الطازجة إلى عُمان والمنطقة بخبرة تزيد على 15 عاماً. اطلبوا سعر اليوم والمتوفر.',
            'image_alt'=> 'إكسبرس نديمي - تصدير الفواكه والخضروات الإيرانية الطازجة',
        ],
    ];

    $seoCfg = $seoDefaults[$lang] ?? $seoDefaults['en'];

    $seoClean = static function ($value): string {
        $value = html_entity_decode(strip_tags((string) $value), ENT_QUOTES | ENT_HTML5, 'UTF-8');
        return trim((string) preg_replace('/\s+/u', ' ', $value));
    };

    $seoTitle       = $seoClean($__env->yieldContent('title')) ?: $seoCfg['title'];
    $seoDescription = $seoClean($__env->yieldContent('description')) ?: $seoCfg['desc'];
    $seoOgTitle     = $seoClean($__env->yieldContent('og_title')) ?: $seoTitle;
    $seoOgDesc      = $seoClean($__env->yieldContent('og_description')) ?: $seoDescription;
    $seoCanonical   = trim($__env->yieldContent('canonical')) ?: url()->current();
    $seoRobots      = trim($__env->yieldContent('robots')) ?: 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1';
    $seoOgType      = trim($__env->yieldContent('og_type')) ?: 'website';
    $seoOgImage     = trim($__env->yieldContent('og_image'));
    $seoHasCustomImage = $seoOgImage !== '';
    $seoOgImage     = $seoHasCustomImage ? $seoOgImage : asset('assets/images/og-image.jpg');
    $seoAltLocales  = collect(['fa' => 'fa_IR', 'en' => 'en_US', 'ar' => 'ar_AR'])->except($lang)->values();
@endphp
    <title>{{ $seoTitle }}</title>
    <meta name="description" content="{{ $seoDescription }}">
    <meta name="robots" content="{{ $seoRobots }}">
    <link rel="canonical" href="{{ $seoCanonical }}">

    <meta name="author" content="Nadimi International">
    <meta name="application-name" content="{{ $seoCfg['site'] }}">
    <meta name="theme-color" content="#fdfdfc">
    <meta name="color-scheme" content="light">
    <meta name="referrer" content="strict-origin-when-cross-origin">

    <!-- Open Graph -->
    <meta property="og:type" content="{{ $seoOgType }}">
    <meta property="og:site_name" content="{{ $seoCfg['site'] }}">
    <meta property="og:locale" content="{{ $seoCfg['locale'] }}">
    @foreach ($seoAltLocales as $altLocale)
    <meta property="og:locale:alternate" content="{{ $altLocale }}">
    @endforeach
    <meta property="og:title" content="{{ $seoOgTitle }}">
    <meta property="og:description" content="{{ $seoOgDesc }}">
    <meta property="og:url" content="{{ $seoCanonical }}">
    <meta property="og:image" content="{{ $seoOgImage }}">
    <meta property="og:image:alt" content="{{ $seoClean($__env->yieldContent('og_image_alt')) ?: $seoCfg['image_alt'] }}">
    @unless ($seoHasCustomImage)
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    @endunless

    <!-- Twitter / X -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $seoOgTitle }}">
    <meta name="twitter:description" content="{{ $seoOgDesc }}">
    <meta name="twitter:image" content="{{ $seoOgImage }}">
