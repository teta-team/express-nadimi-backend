<?php

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

beforeEach(function () {
    Storage::fake('public');
});

function validSupplierData(): array
{
    return [
        'name' => 'Mohammad Reza',
        'company' => 'Fresh Farms Co.',
        'email' => 'reza@freshfarms.ir',
        'phone' => '+989123456789',
        'country' => 'Iran',
        'state' => 'Tehran',
        'city' => 'Tehran',
        'address' => '123 Farm Road',
        'product_categories' => 'Vegetables,Fruits',
        'confirmed' => true,
    ];
}

test('supplier form saves valid submission and redirects', function () {
    $response = $this->withoutMiddleware()->post(route('supplier.store'), validSupplierData());
    $response->assertRedirect(route('supplier'));
    $response->assertSessionHasNoErrors();
});

test('supplier form saves with language parameter', function (string $lang) {
    $response = $this->withoutMiddleware()->post(route('supplier.store', ['lang' => $lang]), validSupplierData());
    $response->assertRedirect();
    $response->assertSessionHasNoErrors();
})->with(['en', 'fa', 'ar']);

test('supplier form requires all core fields', function () {
    $response = $this->withoutMiddleware()->post(route('supplier.store'), []);
    $response->assertSessionHasErrors(['name', 'company', 'email', 'phone', 'country', 'state', 'city', 'address', 'product_categories']);
});

test('supplier form requires confirmation checkbox', function () {
    $data = validSupplierData();
    $data['confirmed'] = false;
    $response = $this->withoutMiddleware()->post(route('supplier.store'), $data);
    $response->assertSessionHasErrors(['confirmed']);
});

test('supplier form validates email format', function () {
    $data = validSupplierData();
    $data['email'] = 'invalid-email';
    $response = $this->withoutMiddleware()->post(route('supplier.store'), $data);
    $response->assertSessionHasErrors(['email']);
});

test('supplier form validates maximum field lengths', function () {
    $data = validSupplierData();
    $data['name'] = str_repeat('a', 121);
    $data['company'] = str_repeat('b', 161);
    $data['address'] = str_repeat('c', 256);
    $data['product_categories'] = str_repeat('d', 501);
    $data['state'] = str_repeat('e', 121);
    $data['city'] = str_repeat('f', 121);
    $response = $this->withoutMiddleware()->post(route('supplier.store'), $data);
    $response->assertSessionHasErrors(['name', 'company', 'address', 'product_categories', 'state', 'city']);
});

test('supplier form treats company and address as optional', function () {
    $data = validSupplierData();
    unset($data['company'], $data['address']);
    $response = $this->withoutMiddleware()->post(route('supplier.store'), $data);
    $response->assertRedirect();
    $response->assertSessionHasNoErrors();
});

test('supplier form validates phone format', function () {
    $data = validSupplierData();
    $data['phone'] = 'not-a-phone';
    $response = $this->withoutMiddleware()->post(route('supplier.store'), $data);
    $response->assertSessionHasErrors(['phone']);
});

test('supplier form trims whitespace', function () {
    $data = validSupplierData();
    $data['name'] = '  Mohammad Reza  ';
    $data['email'] = '  REZA@FRESHFARMS.IR  ';
    $data['country'] = '  Iran  ';
    $data['city'] = '  Tehran  ';
    $this->withoutMiddleware()->post(route('supplier.store'), $data);
});

test('supplier form returns success message in correct language', function (string $lang, string $expectedMessage) {
    $response = $this->withoutMiddleware()->post(route('supplier.store', ['lang' => $lang]), validSupplierData());
    $response->assertSessionHas('success', $expectedMessage);
})->with([
    ['en', 'Your submission has been received successfully.'],
    ['fa', 'درخواست شما با موفقیت دریافت شد.'],
    ['ar', 'تم استقبال طلبك بنجاح.'],
]);

test('supplier form stores photo uploads correctly', function () {
    $data = validSupplierData();
    $data['photos'] = [
        UploadedFile::fake()->image('photo1.jpg', 600, 600),
        UploadedFile::fake()->image('photo2.png', 600, 600),
    ];
    $response = $this->withoutMiddleware()->post(route('supplier.store'), $data);
    $response->assertRedirect();
});

test('supplier form stores video uploads correctly', function () {
    $data = validSupplierData();
    $data['videos'] = [
        UploadedFile::fake()->create('video1.mp4', 5000),
        UploadedFile::fake()->create('video2.webm', 5000),
    ];
    $response = $this->withoutMiddleware()->post(route('supplier.store'), $data);
    $response->assertRedirect();
});

test('supplier form validates photo file types', function () {
    $data = validSupplierData();
    $data['photos'] = [UploadedFile::fake()->create('document.pdf', 100)];
    $response = $this->withoutMiddleware()->post(route('supplier.store'), $data);
    $response->assertSessionHasErrors(['photos.0']);
});

test('supplier form validates video file types', function () {
    $data = validSupplierData();
    $data['videos'] = [UploadedFile::fake()->image('image.jpg')];
    $response = $this->withoutMiddleware()->post(route('supplier.store'), $data);
    $response->assertSessionHasErrors(['videos.0']);
});

test('supplier form limits maximum photo count', function () {
    $data = validSupplierData();
    $data['photos'] = [
        UploadedFile::fake()->image('photo1.jpg'),
        UploadedFile::fake()->image('photo2.jpg'),
        UploadedFile::fake()->image('photo3.jpg'),
        UploadedFile::fake()->image('photo4.jpg'),
        UploadedFile::fake()->image('photo5.jpg'),
        UploadedFile::fake()->image('photo6.jpg'),
    ];
    $response = $this->withoutMiddleware()->post(route('supplier.store'), $data);
    $response->assertSessionHasErrors(['photos']);
});

test('supplier form limits maximum video count', function () {
    $data = validSupplierData();
    $data['videos'] = [
        UploadedFile::fake()->create('video1.mp4', 1000),
        UploadedFile::fake()->create('video2.mp4', 1000),
        UploadedFile::fake()->create('video3.mp4', 1000),
        UploadedFile::fake()->create('video4.mp4', 1000),
        UploadedFile::fake()->create('video5.mp4', 1000),
    ];
    $response = $this->withoutMiddleware()->post(route('supplier.store'), $data);
    $response->assertSessionHasErrors(['videos']);
});

test('supplier form accepts empty photos and videos arrays', function () {
    $data = validSupplierData();
    $data['photos'] = [];
    $data['videos'] = [];
    $response = $this->withoutMiddleware()->post(route('supplier.store'), $data);
    $response->assertRedirect();
    $response->assertSessionHasNoErrors();
});

test('supplier form converts confirmed to boolean', function () {
    $data = validSupplierData();
    $data['confirmed'] = '1';
    $this->withoutMiddleware()->post(route('supplier.store'), $data);
});

test('supplier form rejects non-image files as photos', function () {
    $data = validSupplierData();
    $data['photos'] = [UploadedFile::fake()->create('text.txt', 100)];
    $response = $this->withoutMiddleware()->post(route('supplier.store'), $data);
    $response->assertSessionHasErrors(['photos.0']);
});

test('supplier form rejects non-video files as videos', function () {
    $data = validSupplierData();
    $data['videos'] = [UploadedFile::fake()->image('image.jpg')];
    $response = $this->withoutMiddleware()->post(route('supplier.store'), $data);
    $response->assertSessionHasErrors(['videos.0']);
});
