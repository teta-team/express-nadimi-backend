<?php

test('language selection page renders', function () {
    $this->get('/')
        ->assertOk()
        ->assertViewIs('index');
});

test('admin panel renders', function () {
    $this->get('/panel')
        ->assertOk()
        ->assertViewIs('panel.panel');
});

dataset('localized pages', [
    ['en', 'home'],
    ['fa', 'home'],
    ['ar', 'home'],
    ['en', 'about'],
    ['fa', 'about'],
    ['ar', 'about'],
    ['en', 'contact'],
    ['fa', 'contact'],
    ['ar', 'contact'],
    ['en', 'product'],
    ['fa', 'product'],
    ['ar', 'product'],
    ['en', 'products'],
    ['fa', 'products'],
    ['ar', 'products'],
    ['en', 'supplier'],
    ['fa', 'supplier'],
    ['ar', 'supplier'],
]);

test('localized pages render with the correct direction', function (string $lang, string $page) {
    $response = $this->get("/{$lang}/".($page === 'home' ? '' : $page));

    $response->assertOk()->assertViewIs("{$lang}.{$page}");

    $direction = $lang === 'en' ? 'ltr' : 'rtl';

    $response
        ->assertSee('lang="'.$lang.'"', false)
        ->assertSee('dir="'.$direction.'"', false);
})->with('localized pages');

test('home quote form posts to the current language', function (string $lang) {
    $this->get("/{$lang}")
        ->assertOk()
        ->assertSee('action="'.route('home.post', ['lang' => $lang]).'"', false);
})->with(['en', 'fa', 'ar']);

test('contact form posts to the current language', function (string $lang) {
    $this->get("/{$lang}/contact")
        ->assertOk()
        ->assertSee('action="'.route('contact.post', ['lang' => $lang]).'"', false);
})->with(['en', 'fa', 'ar']);

test('supplier page exposes the submission form markers', function (string $lang) {
    $this->get("/{$lang}/supplier")
        ->assertOk()
        ->assertSee('data-supplier', false)
        ->assertSee('name="frequency"', false)
        ->assertSee('name="confirm"', false)
        ->assertSee('action="'.route('supplier.store', ['lang' => $lang]).'"', false);
})->with(['en', 'fa', 'ar']);

test('unknown page inside a language prefix renders the custom 404 page', function () {
    $this->get('/en/this-page-does-not-exist')
        ->assertNotFound()
        ->assertViewIs('errors.404');
});

test('unsupported language prefix is not routed', function () {
    $this->get('/de')
        ->assertNotFound();
});
