<?php

use App\Models\User;

use function Pest\Laravel\actingAs;

test('Administrators can access the Reservations list', function () {

    $admin = User::create([
        'name' => 'Admin User',
        'email' => 'admin@example.com',
        'password' => bcrypt('password'),
        'role' => 'admin',
    ]);

    actingAs($admin)
        ->get('/admin/reservations')
        ->assertStatus(200);
});

test('Clients cannot access the Reservations list', function () {
    $client = User::create([
        'name' => 'Client User',
        'email' => 'client@example.com',
        'password' => bcrypt('password'),
        'role' => 'client',
    ]);

    actingAs($client)
        ->get('/admin/reservations')
        ->assertStatus(403);
});

test('Administrators can access the Services list', function () {

    $admin = User::create([
        'name' => 'Admin User',
        'email' => 'admin@example.com',
        'password' => bcrypt('password'),
        'role' => 'admin',
    ]);

    actingAs($admin)
        ->get('/admin/services')
        ->assertStatus(200);

});

test('Clients cannot access the Services list', function () {

    $client = User::create([
        'name' => 'Client User',
        'email' => 'client@example.com',
        'password' => bcrypt('password'),
        'role' => 'client',
    ]);

    actingAs($client)
        ->get('/admin/services')
        ->assertStatus(403);

});