<?php

namespace Tests\Feature;

use App\Models\Auth\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_login()
    {
        $user = User::factory()->create();

        $this->json('POST', route('login'), [
            'email' => $user->email,
            'password' => 'password',
        ])->assertStatus(200);
    }

    public function test_password_validate()
    {
        $user = User::factory()->create();

        $this->json('POST', route('login'), [
            'email' => $user->email,
            'password' => 'random',
        ])->assertStatus(401);
    }
}
