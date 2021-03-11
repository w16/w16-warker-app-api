<?php

namespace Tests\Feature;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Indicates whether the default seeder should run before each test.
     *
     * @var bool
     */
    protected $seed = true;

    public function test_new_users_can_register()
    {
        $response = $this->post('api/register', [
            'name' => 'New User',
            'email' => 'newuser@newuser.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertStatus(201);
    }

    public function test_new_users_can_not_register_using_invalid_email()
    {
        $response = $this->post('api/register', [
            'name' => 'Test User',
            'email' => 'invalid_email',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);


        $response->assertStatus(400);
    }

    public function test_new_users_can_not_register_using_different_passwords()
    {
        $response = $this->post('api/register', [
            'name' => 'Test User',
            'email' => 'test@test.com',
            'password' => 'password',
            'password_confirmation' => 'password_different',
        ]);


        $response->assertStatus(400);
    }
}
