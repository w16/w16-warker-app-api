<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Register Post.
     *
     * @return void
     */
    public function test_register()
    {
        $data = ['email' => 'usuario@gmail.com', 'password' => 'dudu12345', 'name' => "Eduardo"];
        $response = $this->json('post', '/api/register', $data);

        $response->assertStatus(200);
    }

    public function test_validate()
    {
        $data = ['email' => 'usuario', 'password' => 'dud3', 'name' => "Eduardo"];
        $response = $this->json('post', '/api/register', $data);

        $response->assertStatus(422);
    }
}
