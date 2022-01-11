<?php

namespace Tests\Feature;

use App\Models\Auth\User;
use App\Models\Gestao\Cidade;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostoTest extends TestCase
{
    use RefreshDatabase;

    public function test_posto_store()
    {
        $User = User::factory()->create();
        $Cidade = Cidade::factory()->create();

        $Login = $this->json('post', '/api/login', ['email' => $User->email, 'password' => "password"]);

        $data = ['cidade_id' => $Cidade->id, 'reservatorio' => 100, 'latitude' => '51.406681', 'longitude' => "30.046425"];
        $response = $this->json('post', '/api/posto', $data, ['Authorization' => "Bearer {$Login->original['access_token']}"]);

        $response->assertStatus(200);
    }


    public function test_posto_validate_store()
    {
        $User = User::factory()->create();

        $Login = $this->json('post', '/api/login', ['email' => $User->email, 'password' => "password"]);

        $data = ['cidade_id' => 1331, 'reservatorio' => 101, 'latitude' => '53331.406681', 'longitude' => "33130.046425"];
        $response = $this->json('post', '/api/posto', $data, ['Authorization' => "Bearer {$Login->original['access_token']}"]);

        $response->assertStatus(422);
    }

}
