<?php

test('renders the sign in page', function () {
    $response = $this->get(route('login'));

    $response->assertSee('Sign in to your workspace')
        ->assertSee('Email address')
        ->assertSee('Keep me signed in');
});

test('requires login credentials', function () {
    $response = $this->from(route('login'))->post(route('login.store'));

    $response->assertRedirect(route('login'))
        ->assertInvalid(['email', 'password']);
});
