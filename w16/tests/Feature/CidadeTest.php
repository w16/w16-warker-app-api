<?php

namespace Tests\Feature;

use App\Models\Auth\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CidadeTest extends TestCase
{
    use RefreshDatabase;

    public function test_cidade_store()
    {
        $User = User::factory()->create();
        $Login = $this->json('post', '/api/login', ['email' => $User->email, 'password' => "password"]);

        $data = ['nome_cidade' => 'Chernobil', 'latitude' => '51.406681', 'longitude' => "30.046425"];
        $response = $this->json('post', '/api/cidade', $data, ['Authorization' => "Bearer {$Login->original['access_token']}"]);

        $response->assertStatus(200);
    }

    public function test_cidade_validate_store()
    {
        $User = User::factory()->create();

        $Login = $this->json('post', '/api/login', ['email' => $User->email, 'password' => "password"]);

        $data = ['nome_cidade' => null, 'latitude' => '53311.406681', 'longitude' => "1130.046425"];
        $response = $this->json('post', '/api/posto', $data, ['Authorization' => "Bearer {$Login->original['access_token']}"]);

        $response->assertStatus(422);
    }

}
