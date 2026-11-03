<?php

use App\Models\Product;

function validProductInquiryData(): array
{
    return [
        'name' => 'Fatima Al-Mansouri',
        'email' => 'fatima@example.com',
        'phone' => '+971551234567',
        'company' => 'Import LLC',
        'message' => 'Interested in bulk orders.',
    ];
}

test('product inquiry form saves valid inquiry and redirects', function () {
    $product = Product::factory()->create(['slug' => 'tomato', 'hidden' => false]);
    $data = validProductInquiryData();
    $data['product_id'] = $product->id;
    $response = $this->withoutMiddleware()->post(route('product.inquiry.post', ['slug' => 'tomato']), $data);
    $response->assertRedirect(route('product.show', ['slug' => 'tomato']));
    $response->assertSessionHasNoErrors();
});

test('product inquiry form saves with language parameter', function (string $lang) {
    $product = Product::factory()->create(['slug' => 'tomato', 'hidden' => false]);
    $data = validProductInquiryData();
    $data['product_id'] = $product->id;
    $response = $this->withoutMiddleware()->post(route('lang.product.inquiry.post', ['lang' => $lang, 'slug' => 'tomato']), $data);
    $response->assertRedirect();
    $response->assertSessionHasNoErrors();
})->with(['en', 'fa', 'ar']);

test('product inquiry form requires all core fields', function () {
    $product = Product::factory()->create(['slug' => 'tomato', 'hidden' => false]);
    $response = $this->withoutMiddleware()->post(route('product.inquiry.post', ['slug' => 'tomato']), ['product_id' => $product->id]);
    $response->assertSessionHasErrors(['name', 'email', 'phone', 'message']);
});

test('product inquiry form requires either email or phone', function () {
    $product = Product::factory()->create(['slug' => 'tomato', 'hidden' => false]);
    $data = validProductInquiryData();
    unset($data['email'], $data['phone']);
    $data['product_id'] = $product->id;
    $response = $this->withoutMiddleware()->post(route('product.inquiry.post', ['slug' => 'tomato']), $data);
    $response->assertSessionHasErrors(['email', 'phone']);
});

test('product inquiry form validates email format', function () {
    $product = Product::factory()->create(['slug' => 'tomato', 'hidden' => false]);
    $data = validProductInquiryData();
    $data['email'] = 'not-an-email';
    $data['product_id'] = $product->id;
    $response = $this->withoutMiddleware()->post(route('product.inquiry.post', ['slug' => 'tomato']), $data);
    $response->assertSessionHasErrors(['email']);
});

test('product inquiry form validates maximum field lengths', function () {
    $product = Product::factory()->create(['slug' => 'tomato', 'hidden' => false]);
    $data = validProductInquiryData();
    $data['name'] = str_repeat('a', 121);
    $data['company'] = str_repeat('b', 161);
    $data['message'] = str_repeat('c', 2001);
    $data['product_id'] = $product->id;
    $response = $this->withoutMiddleware()->post(route('product.inquiry.post', ['slug' => 'tomato']), $data);
    $response->assertSessionHasErrors(['name', 'company', 'message']);
});

test('product inquiry form treats company as optional', function () {
    $product = Product::factory()->create(['slug' => 'tomato', 'hidden' => false]);
    $data = validProductInquiryData();
    unset($data['company']);
    $data['product_id'] = $product->id;
    $response = $this->withoutMiddleware()->post(route('product.inquiry.post', ['slug' => 'tomato']), $data);
    $response->assertRedirect();
    $response->assertSessionHasNoErrors();
});

test('product inquiry form validates product exists', function () {
    $data = validProductInquiryData();
    $data['product_id'] = 9999;
    $response = $this->withoutMiddleware()->post(route('product.inquiry.post', ['slug' => 'nonexistent']), $data);
    $response->assertSessionHasErrors(['product_id']);
});

test('product inquiry form trims whitespace', function () {
    $product = Product::factory()->create(['slug' => 'tomato', 'hidden' => false]);
    $data = validProductInquiryData();
    $data['name'] = '  Fatima Al-Mansouri  ';
    $data['email'] = '  FATIMA@EXAMPLE.COM  ';
    $data['message'] = '  Interested in bulk orders.  ';
    $data['product_id'] = $product->id;
    $this->withoutMiddleware()->post(route('product.inquiry.post', ['slug' => 'tomato']), $data);
});

test('product inquiry form returns success message in correct language', function (string $lang, string $expectedMessage) {
    $product = Product::factory()->create(['slug' => 'tomato', 'hidden' => false]);
    $data = validProductInquiryData();
    $data['product_id'] = $product->id;
    $response = $this->withoutMiddleware()->post(route('lang.product.inquiry.post', ['lang' => $lang, 'slug' => 'tomato']), $data);
    $response->assertSessionHas('success', $expectedMessage);
})->with([
    ['en', 'Your inquiry has been sent successfully.'],
    ['fa', 'درخواست شما با موفقیت ارسال شد.'],
    ['ar', 'تم إرسال طلبك بنجاح.'],
]);

test('product inquiry form stores email when phone only provided', function () {
    $product = Product::factory()->create(['slug' => 'tomato', 'hidden' => false]);
    $data = validProductInquiryData();
    unset($data['phone']);
    $data['product_id'] = $product->id;
    $response = $this->withoutMiddleware()->post(route('product.inquiry.post', ['slug' => 'tomato']), $data);
    $response->assertRedirect();
});

test('product inquiry form stores phone when email only provided', function () {
    $product = Product::factory()->create(['slug' => 'tomato', 'hidden' => false]);
    $data = validProductInquiryData();
    unset($data['email']);
    $data['product_id'] = $product->id;
    $response = $this->withoutMiddleware()->post(route('product.inquiry.post', ['slug' => 'tomato']), $data);
    $response->assertRedirect();
});
