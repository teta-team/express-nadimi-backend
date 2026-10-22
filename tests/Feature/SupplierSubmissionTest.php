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
