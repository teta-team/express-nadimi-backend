<?php

use App\Models\Product;

function validInquiryData(): array
{
    return [
        'name' => 'Ahmed Hassan',
        'company' => 'Trade Co.',
        'email' => 'ahmed@trade.com',
        'phone' => '+201001234567',
        'destination' => 'Dubai',
        'incoterm' => 'CIF',
        'message' => 'Looking for regular supply.',
    ];
}

test('inquiry form saves valid single product inquiry and redirects', function () {
    $product = Product::factory()->create(['slug' => 'apple', 'hidden' => false]);
    $data = validInquiryData();
    $data['product'] = 'apple';
    $data['quantity'] = '10 tons';
    $response = $this->withoutMiddleware()->post(route('home.post'), $data);
    $response->assertRedirect(route('home'));
    $response->assertSessionHasNoErrors();
});

test('inquiry form saves valid multi-product inquiry', function () {
    Product::factory()->create(['slug' => 'apple', 'hidden' => false]);
    Product::factory()->create(['slug' => 'orange', 'hidden' => false]);
    $data = validInquiryData();
    $data['products'] = [
        ['product' => 'apple', 'quantity' => '5 tons', 'packaging' => 'carton_10'],
        ['product' => 'orange', 'quantity' => '3 tons', 'packaging' => 'mesh_bag'],
    ];
    unset($data['product'], $data['quantity'], $data['packaging']);
    $response = $this->withoutMiddleware()->post(route('home.post'), $data);
    $response->assertRedirect();
    $response->assertSessionHasNoErrors();
});

test('inquiry form requires core fields', function () {
    $response = $this->withoutMiddleware()->post(route('home.post'), ['product' => 'apple', 'quantity' => '10 tons']);
    $response->assertSessionHasErrors(['name', 'destination', 'incoterm', 'email', 'phone']);
});

test('inquiry form requires either email or phone', function () {
    $data = validInquiryData();
    unset($data['email'], $data['phone']);
    $data['product'] = 'apple';
    $data['quantity'] = '10 tons';
    $response = $this->withoutMiddleware()->post(route('home.post'), $data);
    $response->assertSessionHasErrors(['email', 'phone']);
});

test('inquiry form validates email format', function () {
    Product::factory()->create(['slug' => 'apple', 'hidden' => false]);
    $data = validInquiryData();
    $data['email'] = 'invalid-email';
    $data['product'] = 'apple';
    $data['quantity'] = '10 tons';
    $response = $this->withoutMiddleware()->post(route('home.post'), $data);
    $response->assertSessionHasErrors(['email']);
});

test('inquiry form validates incoterm values', function () {
    Product::factory()->create(['slug' => 'apple', 'hidden' => false]);
    $data = validInquiryData();
    $data['incoterm'] = 'INVALID';
    $data['product'] = 'apple';
    $data['quantity'] = '10 tons';
    $response = $this->withoutMiddleware()->post(route('home.post'), $data);
    $response->assertSessionHasErrors(['incoterm']);
});

test('inquiry form validates all valid incoterms', function (string $incoterm) {
    Product::factory()->create(['slug' => 'apple', 'hidden' => false]);
    $data = validInquiryData();
    $data['incoterm'] = $incoterm;
    $data['product'] = 'apple';
    $data['quantity'] = '10 tons';
    $response = $this->withoutMiddleware()->post(route('home.post'), $data);
    $response->assertSessionHasNoErrors();
})->with(['FOB', 'CFR', 'CIF', 'EXW', 'FCA', 'DAP']);

test('inquiry form validates maximum field lengths', function () {
    Product::factory()->create(['slug' => 'apple', 'hidden' => false]);
    $data = validInquiryData();
    $data['name'] = str_repeat('a', 121);
    $data['company'] = str_repeat('b', 161);
    $data['destination'] = str_repeat('c', 121);
    $data['message'] = str_repeat('d', 2001);
    $data['product'] = 'apple';
    $data['quantity'] = '10 tons';
    $response = $this->withoutMiddleware()->post(route('home.post'), $data);
    $response->assertSessionHasErrors(['name', 'company', 'destination', 'message']);
});

test('inquiry form treats company and message as optional', function () {
    Product::factory()->create(['slug' => 'apple', 'hidden' => false]);
    $data = validInquiryData();
    unset($data['company'], $data['message']);
    $data['product'] = 'apple';
    $data['quantity'] = '10 tons';
    $response = $this->withoutMiddleware()->post(route('home.post'), $data);
    $response->assertRedirect();
    $response->assertSessionHasNoErrors();
});

test('inquiry form validates product exists and is visible', function () {
    Product::factory()->create(['slug' => 'apple', 'hidden' => true]);
    $data = validInquiryData();
    $data['product'] = 'apple';
    $data['quantity'] = '10 tons';
    $response = $this->withoutMiddleware()->post(route('home.post'), $data);
    $response->assertSessionHasErrors(['product']);
});

test('inquiry form validates quantity contains numbers', function () {
    Product::factory()->create(['slug' => 'apple', 'hidden' => false]);
    $data = validInquiryData();
    $data['product'] = 'apple';
    $data['quantity'] = 'no numbers here';
    $response = $this->withoutMiddleware()->post(route('home.post'), $data);
    $response->assertSessionHasErrors(['quantity']);
});

test('inquiry form validates packaging values', function () {
    Product::factory()->create(['slug' => 'apple', 'hidden' => false]);
    $data = validInquiryData();
    $data['product'] = 'apple';
    $data['quantity'] = '10 tons';
    $data['packaging'] = 'invalid_packaging';
    $response = $this->withoutMiddleware()->post(route('home.post'), $data);
    $response->assertSessionHasErrors(['packaging']);
});

test('inquiry form trims whitespace from input', function () {
    Product::factory()->create(['slug' => 'apple', 'hidden' => false]);
    $data = validInquiryData();
    $data['name'] = '  Ahmed Hassan  ';
    $data['email'] = '  AHMED@TRADE.COM  ';
    $data['destination'] = '  Dubai  ';
    $data['product'] = 'apple';
    $data['quantity'] = '10 tons';
    $this->withoutMiddleware()->post(route('home.post'), $data);
});

test('inquiry form returns success message in correct language', function (string $lang, string $expectedMessage) {
    Product::factory()->create(['slug' => 'apple', 'hidden' => false]);
    $data = validInquiryData();
    $data['product'] = 'apple';
    $data['quantity'] = '10 tons';
    $response = $this->withoutMiddleware()->post(route('lang.home.post', ['lang' => $lang]), $data);
    $response->assertSessionHas('success', $expectedMessage);
})->with([
    ['en', 'Your inquiry has been submitted successfully.'],
    ['fa', 'درخواست استعلام قیمت شما با موفقیت ثبت شد.'],
    ['ar', 'تم إرسال طلب عرض السعر بنجاح.'],
]);
