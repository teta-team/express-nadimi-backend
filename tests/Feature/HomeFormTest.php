<?php

function validHomeQuoteData(): array
{
    return [
        'product' => 'apple',
        'quantity' => '20 tons',
        'packaging' => 'carton_10',
        'incoterm' => 'FOB',
        'destination' => 'Dubai, UAE',
        'name' => 'Jane Doe',
        'company' => 'Fresh Trade LLC',
        'email' => 'jane@example.com',
        'phone' => '+971501234567',
        'message' => 'Please send your best offer.',
    ];
}

test('home quote form accepts a valid request', function () {
    $response = $this->post(route('home.post', ['lang' => 'en']), validHomeQuoteData());

    $response->assertOk();
    $response->assertSessionHasNoErrors();
});

test('home quote form accepts a request without optional fields', function () {
    $data = validHomeQuoteData();
    unset($data['product'], $data['packaging'], $data['company'], $data['message'], $data['phone']);

    $response = $this->post(route('home.post', ['lang' => 'fa']), $data);

    $response->assertOk();
    $response->assertSessionHasNoErrors();
});

test('home quote form requires the delivery fields', function () {
    $response = $this->post(route('home.post', ['lang' => 'en']), []);

    $response->assertSessionHasErrors([
        'quantity',
        'incoterm',
        'destination',
        'name',
        'email',
        'phone',
    ]);
});

test('home quote form requires an email or a phone number', function () {
    $data = validHomeQuoteData();
    unset($data['email'], $data['phone']);

    $this->post(route('home.post', ['lang' => 'en']), $data)
        ->assertSessionHasErrors(['email', 'phone']);
});

test('home quote form rejects values outside the allowed lists', function () {
    $data = validHomeQuoteData();
    $data['product'] = 'durian';
    $data['packaging'] = 'wooden_crate';
    $data['incoterm'] = 'DDP';

    $this->post(route('home.post', ['lang' => 'en']), $data)
        ->assertSessionHasErrors(['product', 'packaging', 'incoterm']);
});

test('home quote form validates the email format', function () {
    $data = validHomeQuoteData();
    $data['email'] = 'not-an-email';

    $this->post(route('home.post', ['lang' => 'en']), $data)
        ->assertSessionHasErrors(['email']);
});

test('home quote form validates maximum lengths', function () {
    $data = validHomeQuoteData();
    $data['quantity'] = str_repeat('a', 81);
    $data['destination'] = str_repeat('b', 121);
    $data['name'] = str_repeat('c', 121);
    $data['message'] = str_repeat('d', 2001);

    $this->post(route('home.post', ['lang' => 'en']), $data)
        ->assertSessionHasErrors(['quantity', 'destination', 'name', 'message']);
});
