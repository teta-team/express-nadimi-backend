<?php

use App\Models\SupplierSubmission;

function validSupplierFormData(): array
{
    return [
        'name' => 'John Supplier',
        'mobile' => '+989123456789',
        'city' => 'Tehran',
        'province' => 'Tehran',
        'role' => 'farmer',
        'product' => 'Fresh Apples',
        'origin' => 'Iran',
        'quantity_tons' => '10.5',
        'ready_from' => '2026-12-01',
        'confirm' => '1',
    ];
}

test('supplier index view renders', function () {
    $this->get(route('supplier'))
        ->assertStatus(200)
        ->assertViewIs('en.supplier');

    $this->get(route('lang.supplier', ['lang' => 'fa']))
        ->assertStatus(200)
        ->assertViewIs('fa.supplier');
});

test('supplier form accepts valid data, stores submission, and redirects back with success', function () {
    $data = validSupplierFormData();

    $response = $this->from(route('supplier'))
        ->post(route('supplier.store'), $data);

    $response->assertRedirect(route('supplier'));
    $response->assertSessionHas('success');

    $this->assertDatabaseHas('supplier_submissions', [
        'name' => 'John Supplier',
        'mobile' => '+989123456789',
        'city' => 'Tehran',
        'product' => 'Fresh Apples',
    ]);
});

test('supplier form validates required fields and redirects back with errors', function () {
    $response = $this->from(route('supplier'))
        ->post(route('supplier.store'), []);

    $response->assertRedirect(route('supplier'));
    $response->assertSessionHasErrors([
        'name',
        'mobile',
        'city',
        'province',
        'role',
        'product',
        'origin',
        'quantity_tons',
        'ready_from',
        'confirm',
    ]);
});
