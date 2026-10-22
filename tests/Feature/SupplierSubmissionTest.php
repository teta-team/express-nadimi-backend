<?php

use App\Models\SupplierSubmission;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

uses(RefreshDatabase::class);

function requiredSupplierData(): array
{
    return [
        'name' => 'John Farmer',
        'mobile' => '+989144172605',
        'city' => 'Tabriz',
        'province' => 'east_azerbaijan',
        'role' => 'farmer',
        'product' => 'Apple',
        'origin' => 'Tabriz',
        'quantity_tons' => 12,
        'frequency' => 'single',
        'ready_from' => '2026-11-01',
        'confirm' => '1',
    ];
}

test('supplier submission stores when only required fields are filled', function () {
    Storage::fake('public');

    $data = requiredSupplierData();
    $data['photos'] = [UploadedFile::fake()->image('apple.jpg')];
    $data['grade'] = '';
    $data['state'] = '';
    $data['visit'] = '';

    $response = $this->post(route('supplier.store', ['lang' => 'en']), $data);

    $response->assertRedirect();
    $response->assertSessionHas('success');

    $submission = SupplierSubmission::first();
    expect($submission)->not->toBeNull();
    expect($submission->name)->toBe('John Farmer');
    expect($submission->grade)->toBeNull();
    expect($submission->price)->toBeNull();
    expect($submission->photos)->toHaveCount(1);
    Storage::disk('public')->assertExists($submission->photos[0]);
});

test('supplier submission fails with missing required fields', function () {
    $response = $this->post(route('supplier.store', ['lang' => 'en']), [
        'name' => 'John Farmer',
    ]);

    $response->assertSessionHasErrors(['mobile', 'city', 'province', 'role', 'product', 'origin', 'quantity_tons', 'ready_from', 'confirm']);
    expect(SupplierSubmission::count())->toBe(0);
});

test('supplier submission validates mobile number format', function () {
    $data = requiredSupplierData();
    $data['mobile'] = 'invalid-phone';

    $response = $this->post(route('supplier.store', ['lang' => 'en']), $data);

    $response->assertSessionHasErrors(['mobile']);
    expect(SupplierSubmission::count())->toBe(0);
});

test('supplier submission validates date range', function () {
    $data = requiredSupplierData();
    $data['ready_from'] = '2027-10-31';
    $data['ready_until'] = '2026-11-01';

    $response = $this->post(route('supplier.store', ['lang' => 'en']), $data);

    $response->assertSessionHasErrors(['ready_until']);
    expect(SupplierSubmission::count())->toBe(0);
});

test('supplier submission validates role values', function () {
    $data = requiredSupplierData();
    $data['role'] = 'invalid_role';

    $response = $this->post(route('supplier.store', ['lang' => 'en']), $data);

    $response->assertSessionHasErrors(['role']);
    expect(SupplierSubmission::count())->toBe(0);
});

test('supplier submission requires confirm checkbox', function () {
    $data = requiredSupplierData();
    unset($data['confirm']);

    $response = $this->post(route('supplier.store', ['lang' => 'en']), $data);

    $response->assertSessionHasErrors(['confirm']);
    expect(SupplierSubmission::count())->toBe(0);
});

test('supplier submission validates numeric quantity', function () {
    $data = requiredSupplierData();
    $data['quantity_tons'] = -10;

    $response = $this->post(route('supplier.store', ['lang' => 'en']), $data);

    $response->assertSessionHasErrors(['quantity_tons']);
    expect(SupplierSubmission::count())->toBe(0);
});

test('server validation errors are translated and rendered for the modal', function () {
    $data = requiredSupplierData();
    $data['mobile'] = 'invalid-phone';

    $this->from('/fa/supplier')
        ->post(route('supplier.store', ['lang' => 'fa']), $data)
        ->assertRedirect('/fa/supplier');

    $this->get('/fa/supplier')
        ->assertOk()
        ->assertSee('data-server-errors', false)
        ->assertSee('شماره موبایل');
});

test('supplier submission stores when the optional frequency is not selected', function () {
    $data = requiredSupplierData();
    unset($data['frequency']);

    $this->post(route('supplier.store', ['lang' => 'en']), $data)
        ->assertRedirect()
        ->assertSessionHasNoErrors();

    expect(SupplierSubmission::first()->frequency)->toBeNull();
});

test('supplier submission converts the change packaging answer to a boolean', function (string $answer, ?bool $expected) {
    $data = requiredSupplierData();
    $data['change_pack'] = $answer;

    $this->post(route('supplier.store', ['lang' => 'en']), $data)->assertRedirect();

    expect(SupplierSubmission::first()->change_pack)->toBe($expected);
})->with([
    ['yes', true],
    ['no', false],
    ['', null],
]);

test('supplier submission stores photos, packaging photos and a video', function () {
    Storage::fake('public');

    $data = requiredSupplierData();
    $data['photos'] = [
        UploadedFile::fake()->image('front.jpg'),
        UploadedFile::fake()->image('back.png'),
    ];
    $data['packaging_photos'] = [UploadedFile::fake()->image('box.webp')];
    $data['video'] = UploadedFile::fake()->create('clip.mp4', 256, 'video/mp4');

    $this->post(route('supplier.store', ['lang' => 'en']), $data)->assertRedirect();

    $submission = SupplierSubmission::first();

    expect($submission->photos)->toHaveCount(2)
        ->and($submission->packaging_photos)->toHaveCount(1)
        ->and($submission->video)->not->toBeNull();

    foreach ($submission->photos as $path) {
        Storage::disk('public')->assertExists($path);
    }

    Storage::disk('public')->assertExists($submission->packaging_photos[0]);
    Storage::disk('public')->assertExists($submission->video);
});

test('supplier submission rejects more than eight photos', function () {
    Storage::fake('public');

    $data = requiredSupplierData();
    $data['photos'] = collect(range(1, 9))
        ->map(fn (int $i) => UploadedFile::fake()->image("photo-{$i}.jpg"))
        ->all();

    $this->post(route('supplier.store', ['lang' => 'en']), $data)
        ->assertSessionHasErrors(['photos']);

    expect(SupplierSubmission::count())->toBe(0);
});

test('supplier submission rejects non image photo uploads', function () {
    Storage::fake('public');

    $data = requiredSupplierData();
    $data['photos'] = [UploadedFile::fake()->create('document.pdf', 10, 'application/pdf')];

    $this->post(route('supplier.store', ['lang' => 'en']), $data)
        ->assertSessionHasErrors(['photos.0']);

    expect(SupplierSubmission::count())->toBe(0);
});

test('supplier submission rejects unsupported video formats', function () {
    Storage::fake('public');

    $data = requiredSupplierData();
    $data['video'] = UploadedFile::fake()->create('clip.avi', 256, 'video/x-msvideo');

    $this->post(route('supplier.store', ['lang' => 'en']), $data)
        ->assertSessionHasErrors(['video']);

    expect(SupplierSubmission::count())->toBe(0);
});

test('supplier submission validates optional numeric fields', function () {
    $data = requiredSupplierData();
    $data['price'] = -1;
    $data['pack_weight'] = -1;
    $data['years'] = 101;

    $this->post(route('supplier.store', ['lang' => 'en']), $data)
        ->assertSessionHasErrors(['price', 'pack_weight', 'years']);

    expect(SupplierSubmission::count())->toBe(0);
});

test('supplier submission validates the whatsapp format', function () {
    $data = requiredSupplierData();
    $data['whatsapp'] = 'call me';

    $this->post(route('supplier.store', ['lang' => 'en']), $data)
        ->assertSessionHasErrors(['whatsapp']);

    expect(SupplierSubmission::count())->toBe(0);
});

test('supplier submission requires an accepted confirmation', function () {
    $data = requiredSupplierData();
    $data['confirm'] = '0';

    $this->post(route('supplier.store', ['lang' => 'en']), $data)
        ->assertSessionHasErrors(['confirm']);

    expect(SupplierSubmission::count())->toBe(0);
});

test('supplier submission rejects an invalid ready date', function () {
    $data = requiredSupplierData();
    $data['ready_from'] = 'not-a-date';

    $this->post(route('supplier.store', ['lang' => 'en']), $data)
        ->assertSessionHasErrors(['ready_from']);

    expect(SupplierSubmission::count())->toBe(0);
});

test('supplier submission validates the notes length', function () {
    $data = requiredSupplierData();
    $data['notes'] = str_repeat('a', 4001);

    $this->post(route('supplier.store', ['lang' => 'en']), $data)
        ->assertSessionHasErrors(['notes']);

    expect(SupplierSubmission::count())->toBe(0);
});

test('supplier submission returns a success message in the request language', function (string $lang, string $message) {
    $this->post(route('supplier.store', ['lang' => $lang]), requiredSupplierData())
        ->assertRedirect()
        ->assertSessionHas('success', $message);
})->with([
    ['en', 'Your submission has been received. Our team will contact you soon.'],
    ['fa', 'فرم شما با موفقیت ثبت شد. کارشناسان ما به‌زودی با شما تماس می‌گیرند.'],
    ['ar', 'تم استلام نموذجكم بنجاح. سيتواصل معكم فريقنا قريباً.'],
]);
