<?php

test('renders the create account page', function () {
    $response = $this->get(route('register'));

    $response->assertSee('Create your workspace')
        ->assertSee('First name')
        ->assertSee('Confirm password');
});

test('requires account details', function () {
    $response = $this->from(route('register'))->post(route('register.store'));

    $response->assertRedirect(route('register'))
        ->assertInvalid(['first_name', 'last_name', 'email', 'password']);
});
