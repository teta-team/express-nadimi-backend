<?php

use App\Models\ContactMessage;
use App\Models\PriceInquiry;
use App\Models\Product;
use App\Models\SupplierSubmission;
use App\Models\User;

beforeEach(function () {
    $this->admin = User::firstOrCreate(
        ['username' => 'admin'],
        ['name' => 'Admin', 'password' => 'admin']
    );
    $this->admin->forceFill(['is_superuser' => true])->save();

    $this->product = Product::firstOrCreate(
        ['slug' => 'mango'],
        [
            'name' => ['fa' => 'انبه', 'en' => 'Mango', 'ar' => 'مانجو'],
            'category' => 'stone-fruits',
            'status' => 'available',
            'months' => array_fill(0, 12, true),
            'hidden' => false,
        ]
    );
});

test('admin dashboard renders', function () {
    $this->actingAs($this->admin)
        ->get(route('admin.dashboard'))
        ->assertOk()
        ->assertSee('داشبورد');
});

test('admin product create and edit pages render', function () {
    $this->actingAs($this->admin)
        ->get(route('admin.products.create'))
        ->assertOk();

    $this->actingAs($this->admin)
        ->get(route('admin.products.edit', $this->product))
        ->assertOk();
});

test('admin settings page renders and can update the account', function () {
    $this->actingAs($this->admin)
        ->get(route('admin.settings'))
        ->assertOk()
        ->assertSee('تنظیمات حساب');

    $this->actingAs($this->admin)
        ->post(route('admin.settings.update'), [
            'name' => 'New Admin',
            'username' => $this->admin->username,
            'current_password' => 'admin',
            'password' => '',
            'password_confirmation' => '',
        ])
        ->assertRedirect()
        ->assertSessionHasNoErrors();

    expect($this->admin->fresh()->name)->toBe('New Admin');
});

test('contact messages are stored and visible in the admin panel', function () {
    $this->post(route('contact.post', ['lang' => 'en']), [
        'type' => 'complaint',
        'office' => 'om',
        'name' => 'Jane Doe',
        'subject' => 'Damaged boxes',
        'email' => 'jane@example.com',
        'phone' => '+971501234567',
        'order_ref' => 'ORD-1',
        'body' => 'Several boxes arrived damaged.',
    ])->assertRedirect();

    $message = ContactMessage::query()->latest('id')->first();

    expect($message)->not->toBeNull()
        ->and($message->type)->toBe('complaint')
        ->and($message->name)->toBe('Jane Doe');

    $this->actingAs($this->admin)
        ->get(route('admin.messages.index'))
        ->assertOk()
        ->assertSee('Jane Doe');

    $this->actingAs($this->admin)
        ->get(route('admin.messages.show', $message->id))
        ->assertOk()
        ->assertSee('Several boxes arrived damaged.');
});

test('a single-product inquiry is stored', function () {
    $this->post(route('home.post', ['lang' => 'en']), [
        'product' => $this->product->slug,
        'quantity' => '20 tons',
        'packaging' => 'carton_10',
        'incoterm' => 'FOB',
        'destination' => 'Dubai, UAE',
        'name' => 'Jane Doe',
        'email' => 'jane@example.com',
        'phone' => '+971501234567',
    ])->assertRedirect();

    $inquiry = PriceInquiry::query()->latest('id')->first();

    expect($inquiry)->not->toBeNull()
        ->and($inquiry->items()->count())->toBe(1);
});

test('a multiple-product inquiry is stored with every item', function () {
    $second = Product::firstOrCreate(
        ['slug' => 'banana'],
        [
            'name' => ['fa' => 'موز', 'en' => 'Banana', 'ar' => 'موز'],
            'category' => 'orchard-fruits',
            'status' => 'available',
            'months' => array_fill(0, 12, true),
            'hidden' => false,
        ]
    );

    $this->post(route('home.post', ['lang' => 'en']), [
        'products' => [
            ['product' => $this->product->slug, 'quantity' => '10 tons', 'packaging' => 'carton_5'],
            ['product' => $second->slug, 'quantity' => '5 tons', 'packaging' => 'tray'],
        ],
        'incoterm' => 'CIF',
        'destination' => 'Muscat, Oman',
        'name' => 'Jane Doe',
        'email' => 'jane@example.com',
        'phone' => '+971501234567',
    ])->assertRedirect();

    $inquiry = PriceInquiry::query()->latest('id')->first();

    expect($inquiry)->not->toBeNull()
        ->and($inquiry->items()->count())->toBe(2);
});

test('admin can create, update, soft-delete and restore a product', function () {
    $this->actingAs($this->admin)
        ->post(route('admin.products.store'), [
            'name' => ['fa' => 'خیار', 'en' => 'Cucumber', 'ar' => 'خيار'],
            'category' => 'vegetables',
            'status' => 'available',
            'months_submitted' => true,
            'months' => [1, 2, 3],
            'hidden' => false,
        ])
        ->assertRedirect(route('admin.products.index'))
        ->assertSessionHasNoErrors();

    $product = Product::query()->latest('id')->first();

    expect($product)->not->toBeNull()
        ->and($product->name['en'])->toBe('Cucumber')
        ->and($product->months)->toHaveCount(12)
        ->and($product->months[0])->toBeTrue()
        ->and($product->months[5])->toBeFalse();

    $this->actingAs($this->admin)
        ->put(route('admin.products.update', $product), [
            'name' => ['fa' => 'خیار گلخانه‌ای', 'en' => 'Greenhouse Cucumber', 'ar' => 'خيار'],
            'category' => 'vegetables',
            'status' => 'off_season',
            'months_submitted' => true,
            'months' => [4, 5],
            'hidden' => true,
        ])
        ->assertRedirect(route('admin.products.index'))
        ->assertSessionHasNoErrors();

    $product->refresh();

    expect($product->name['en'])->toBe('Greenhouse Cucumber')
        ->and($product->status)->toBe('off_season')
        ->and($product->hidden)->toBeTrue();

    $this->actingAs($this->admin)
        ->delete(route('admin.products.destroy', $product))
        ->assertRedirect();

    expect(Product::query()->whereKey($product->id)->exists())->toBeFalse()
        ->and(Product::onlyTrashed()->whereKey($product->id)->exists())->toBeTrue();

    $this->actingAs($this->admin)
        ->post(route('admin.products.restore', $product->id))
        ->assertRedirect(route('admin.products.trash'));

    expect(Product::query()->whereKey($product->id)->exists())->toBeTrue();
});

test('admin can change the status of a price inquiry', function () {
    $inquiry = PriceInquiry::create([
        'name' => 'Jane Doe',
        'email' => 'jane@example.com',
        'phone' => '+971501234567',
        'destination' => 'Dubai, UAE',
        'incoterm' => 'FOB',
        'status' => 'new',
    ]);

    $this->actingAs($this->admin)
        ->patch(route('admin.Request.updateStatus', ['type' => 'price', 'id' => $inquiry->id]), [
            'status' => 'in_progress',
        ])
        ->assertRedirect();

    expect($inquiry->fresh()->status)->toBe('in_progress');
});

test('request detail pages render for price inquiries and supplier submissions', function () {
    $inquiry = PriceInquiry::create([
        'name' => 'Jane Doe',
        'company' => 'Fresh Co',
        'email' => 'jane@example.com',
        'phone' => '+971501234567',
        'destination' => 'Dubai, UAE',
        'incoterm' => 'FOB',
        'message' => 'Please quote for the coming season.',
        'status' => 'new',
    ]);

    $inquiry->items()->create([
        'product_id' => $this->product->id,
        'quantity' => '20 tons',
        'packaging' => 'carton_10',
    ]);

    $this->actingAs($this->admin)
        ->get(route('admin.Request.show', ['type' => 'price', 'id' => $inquiry->id]))
        ->assertOk()
        ->assertSee('اطلاعات تماس')
        ->assertSee('محصولات درخواستی')
        ->assertSee('انبه')
        ->assertSee('کارتن ۱۰ کیلویی')
        ->assertSee('Fresh Co');

    $supplier = SupplierSubmission::create([
        'name' => 'Ali Rezaei',
        'mobile' => '+989121234567',
        'city' => 'Shiraz',
        'province' => 'Fars',
        'role' => 'orchard',
        'product' => 'Pomegranate',
        'origin' => 'Fars',
        'quantity_tons' => 12,
        'frequency' => 'weekly',
        'ready_from' => now()->addDay(),
        'state' => 'fresh',
        'sorted' => 'yes',
        'price' => 150000,
        'price_terms' => 'farm',
        'change_pack' => true,
        'notes' => 'Sample note for the supplier.',
        'status' => 'new',
    ]);

    $this->actingAs($this->admin)
        ->get(route('admin.Request.show', ['type' => 'supplier', 'id' => $supplier->id]))
        ->assertOk()
        ->assertSee('مشخصات تأمین‌کننده')
        ->assertSee('مشخصات محصول')
        ->assertSee('Pomegranate')
        ->assertSee('باغدار')
        ->assertSee('هفتگی')
        ->assertSee('Sample note for the supplier.');
});
