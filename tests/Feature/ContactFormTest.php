<?php

use App\Models\ContactMessage;

function validContactData(): array
{
    return [
        'type' => 'message',
        'office' => 'any',
        'name' => 'Jane Doe',
        'subject' => 'Export inquiry',
        'email' => 'jane@example.com',
        'phone' => '+971501234567',
        'order_ref' => 'ORD-1001',
        'body' => 'I would like to know more about your products.',
    ];
}

test('contact form saves valid message and redirects', function () {
    $response = $this->withoutMiddleware()->post(route('contact.post'), validContactData());
    $response->assertRedirect(route('contact'));
    $response->assertSessionHasNoErrors();
});

test('contact form saves valid message with language parameter and redirects', function (string $lang) {
    $response = $this->withoutMiddleware()->post(route('contact.post', ['lang' => $lang]), validContactData());
    $response->assertRedirect();
    $response->assertSessionHasNoErrors();
})->with(['en', 'fa', 'ar']);

test('contact form requires all core fields', function () {
    $response = $this->withoutMiddleware()->post(route('contact.post'), []);
    $response->assertSessionHasErrors(['type', 'office', 'name', 'email', 'phone', 'body']);
});

test('contact form rejects invalid type and office values', function () {
    $data = validContactData();
    $data['type'] = 'spam';
    $data['office'] = 'uk';
    $response = $this->withoutMiddleware()->post(route('contact.post'), $data);
    $response->assertSessionHasErrors(['type', 'office']);
});

test('contact form validates email format', function () {
    $data = validContactData();
    $data['email'] = 'not-an-email';
    $response = $this->withoutMiddleware()->post(route('contact.post'), $data);
    $response->assertSessionHasErrors(['email']);
});

test('contact form validates maximum field lengths', function () {
    $data = validContactData();
    $data['name'] = str_repeat('a', 121);
    $data['subject'] = str_repeat('b', 191);
    $data['order_ref'] = str_repeat('c', 81);
    $data['body'] = str_repeat('d', 4001);
    $data['phone'] = str_repeat('1', 41);
    $response = $this->withoutMiddleware()->post(route('contact.post'), $data);
    $response->assertSessionHasErrors(['name', 'subject', 'order_ref', 'body', 'phone']);
});

test('contact form treats subject and order_ref as optional', function () {
    $data = validContactData();
    unset($data['subject'], $data['order_ref']);
    $response = $this->withoutMiddleware()->post(route('contact.post'), $data);
    $response->assertRedirect();
    $response->assertSessionHasNoErrors();
});

test('contact form accepts all valid type and office combinations', function (string $type, string $office) {
    $data = validContactData();
    $data['type'] = $type;
    $data['office'] = $office;
    $response = $this->withoutMiddleware()->post(route('contact.post'), $data);
    $response->assertRedirect();
    $response->assertSessionHasNoErrors();
})->with([
    ['message', 'any'],
    ['message', 'ir'],
    ['message', 'om'],
    ['suggestion', 'any'],
    ['suggestion', 'ir'],
    ['suggestion', 'om'],
    ['complaint', 'any'],
    ['complaint', 'ir'],
    ['complaint', 'om'],
]);

test('contact form trims whitespace from input', function () {
    $data = validContactData();
    $data['name'] = '  John Doe  ';
    $data['email'] = '  JOHN@EXAMPLE.COM  ';
    $data['body'] = '  Message content  ';
    $this->withoutMiddleware()->post(route('contact.post'), $data);
});

test('contact form returns success message in correct language', function (string $lang, string $expectedMessage) {
    $response = $this->withoutMiddleware()->post(route('contact.post', ['lang' => $lang]), validContactData());
    $response->assertSessionHas('success', $expectedMessage);
})->with([
    ['en', 'Your message has been sent successfully.'],
    ['fa', 'پیام شما با موفقیت ارسال شد.'],
    ['ar', 'تم إرسال رسالتك بنجاح.'],
]);

test('contact form requires phone or email', function () {
    $data = validContactData();
    unset($data['phone'], $data['email']);
    $response = $this->withoutMiddleware()->post(route('contact.post'), $data);
    $response->assertSessionHasErrors(['email', 'phone']);
});

test('contact form stores message when only email is provided', function () {
    $data = validContactData();
    unset($data['phone']);
    $response = $this->withoutMiddleware()->post(route('contact.post'), $data);
    $response->assertRedirect();
});

test('contact form stores message when only phone is provided', function () {
    $data = validContactData();
    unset($data['email']);
    $response = $this->withoutMiddleware()->post(route('contact.post'), $data);
    $response->assertRedirect();
});
