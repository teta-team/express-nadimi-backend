<?php

use App\Models\SupplierSubmission;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;

uses(RefreshDatabase::class);

function minimalSupplierAttributes(): array
{
    return [
        'name' => 'Jane Farmer',
        'mobile' => '+989144172605',
        'city' => 'Tabriz',
        'province' => 'east_azerbaijan',
        'role' => 'farmer',
        'product' => 'Apple',
        'origin' => 'Tabriz',
        'ready_from' => '2026-11-01',
    ];
}

test('supplier submission exposes the expected fillable attributes', function () {
    $fillable = (new SupplierSubmission)->getFillable();

    expect($fillable)
        ->toContain('name')
        ->toContain('photos')
        ->toContain('price')
        ->not->toContain('confirm');
});

test('supplier submission can be created with only the required attributes', function () {
    $submission = SupplierSubmission::create(minimalSupplierAttributes());

    expect($submission->exists)->toBeTrue()
        ->and($submission->fresh()->name)->toBe('Jane Farmer')
        ->and($submission->fresh()->price)->toBeNull()
        ->and($submission->fresh()->grade)->toBeNull()
        ->and($submission->fresh()->frequency)->toBeNull();
});

test('supplier submission casts boolean, decimal, json and date attributes', function () {
    $submission = SupplierSubmission::create(minimalSupplierAttributes());

    $submission->update([
        'price' => 12.5,
        'change_pack' => true,
        'photos' => ['supplier/photos/a.jpg', 'supplier/photos/b.png'],
        'packaging_photos' => ['supplier/packaging_photos/c.webp'],
        'ready_from' => '2026-11-01',
        'ready_until' => '2026-12-01',
    ]);

    $fresh = $submission->fresh();

    expect($fresh->change_pack)->toBeTrue()
        ->and($fresh->price)->toBe('12.50')
        ->and($fresh->photos)->toBe(['supplier/photos/a.jpg', 'supplier/photos/b.png'])
        ->and($fresh->packaging_photos)->toBe(['supplier/packaging_photos/c.webp'])
        ->and($fresh->ready_from)->toBeInstanceOf(Carbon::class)
        ->and($fresh->ready_from->toDateString())->toBe('2026-11-01')
        ->and($fresh->ready_until->toDateString())->toBe('2026-12-01');
});

test('supplier submission ignores the confirmation attribute during mass assignment', function () {
    $submission = SupplierSubmission::create([
        ...minimalSupplierAttributes(),
        'confirm' => true,
    ]);

    expect($submission->getAttributes())->not->toHaveKey('confirm');
});
