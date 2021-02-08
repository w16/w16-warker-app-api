<?php

namespace Tests\Feature;

use App\Models\Cidade;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use App\Models\User;

class ApiEndpointsTest extends TestCase
{
    use RefreshDatabase;

    public function test_cidade_can_be_created()
    {
        $cidade = Cidade::factory()->make();

        Sanctum::actingAs(User::factory()->create());

        $response = $this->postJson('/api/cidade', [
            'nome' => $cidade->nome_da_cidade,
            'lat' => $cidade->latitude,
            'lng' => $cidade->longitude,
        ]);

        $response->assertStatus(201);
    }

    public function test_cidade_with_invalid_name_cannot_be_created()
    {
        $cidade = Cidade::factory()->make();

        Sanctum::actingAs(User::factory()->create());

        $response = $this->postJson('/api/cidade', [
            'nome' => 123,
            'lat' => $cidade->latitude,
            'lng' => $cidade->longitude,
        ]);

        $response->assertStatus(422);
    }

    public function test_cidade_with_invalid_location_cannot_be_created()
    {
        Sanctum::actingAs(User::factory()->create());

        $cidade = Cidade::factory()->make();

        $response = $this->postJson('/api/cidade', [
            'nome' => $cidade->nome_da_cidade,
            'lat' => '-abc',
            'lng' => 'abc',
        ]);

        $response->assertStatus(422);
    }
}
