<?php

function validContactMessageData(): array
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

test('contact form accepts a valid message', function () {
    $response = $this->post(route('contact.post', ['lang' => 'en']), validContactMessageData());

    $response->assertRedirect();
    $response->assertSessionHasNoErrors();
});

test('contact form accepts every message type and office', function (string $type, string $office) {
    $data = validContactMessageData();
    $data['type'] = $type;
    $data['office'] = $office;

    $this->post(route('contact.post', ['lang' => 'fa']), $data)
        ->assertRedirect()
        ->assertSessionHasNoErrors();
})->with([
    ['message', 'any'],
    ['suggestion', 'ir'],
    ['complaint', 'om'],
]);

test('contact form requires the core fields', function () {
    $this->post(route('contact.post', ['lang' => 'en']), [])
        ->assertSessionHasErrors(['type', 'office', 'name', 'email', 'phone', 'body']);
});

test('contact form rejects invalid message types and offices', function () {
    $data = validContactMessageData();
    $data['type'] = 'spam';
    $data['office'] = 'de';

    $this->post(route('contact.post', ['lang' => 'en']), $data)
        ->assertSessionHasErrors(['type', 'office']);
});

test('contact form validates the email format', function () {
    $data = validContactMessageData();
    $data['email'] = 'invalid';

    $this->post(route('contact.post', ['lang' => 'en']), $data)
        ->assertSessionHasErrors(['email']);
});

test('contact form validates maximum lengths', function () {
    $data = validContactMessageData();
    $data['name'] = str_repeat('a', 121);
    $data['subject'] = str_repeat('b', 191);
    $data['order_ref'] = str_repeat('c', 81);
    $data['body'] = str_repeat('d', 4001);

    $this->post(route('contact.post', ['lang' => 'en']), $data)
        ->assertSessionHasErrors(['name', 'subject', 'order_ref', 'body']);
});

test('contact form treats subject and order reference as optional', function () {
    $data = validContactMessageData();
    unset($data['subject'], $data['order_ref']);

    $this->post(route('contact.post', ['lang' => 'ar']), $data)
        ->assertRedirect()
        ->assertSessionHasNoErrors();
});
