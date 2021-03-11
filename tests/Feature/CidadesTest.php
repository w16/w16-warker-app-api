<?php

namespace Tests\Feature;

use App\Models\Cidade;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;
use App\Models\User;

class CidadesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Indicates whether the default seeder should run before each test.
     *
     * @var bool
     */
    protected $seed = true;

    public function test_cidade_can_be_created()
    {
        $cidade = Cidade::factory()->make();

        $this->actingAs(User::factory()->create());

        $response = $this->postJson('/api/cidades', [
            'nome_da_cidade' => $cidade->nome_da_cidade,
            'latitude' => $cidade->latitude,
            'longitude' => $cidade->longitude,
        ]);

        $response->assertStatus(201);
    }

    public function test_cidade_with_invalid_city_name_cannot_be_created()
    {
        $cidade = Cidade::factory()->make();

        $this->actingAs(User::factory()->create());

        $response = $this->postJson('/api/cidades', [
            'nome_da_cidade' => 123456,
            'latitude' => $cidade->latitude,
            'longitude' => $cidade->longitude,
        ]);

        $response->assertStatus(500);
    }

    public function test_cidade_with_invalid_coordinates_cannot_be_created()
    {
        $this->actingAs(User::factory()->create());

        $cidade = Cidade::factory()->make();

        $response = $this->postJson('/api/cidades', [
            'nome_da_cidade' => $cidade->nome_da_cidade,
            'latitude' => 'invalid_latitude',
            'longitude' => 'invalid_latitude',
        ]);

        $response->assertStatus(500);
    }

    public function test_cidade_cannot_be_created_without_logged_user()
    {
        $cidade = Cidade::factory()->make();

        $response = $this->postJson('/api/cidades', [
            'nome_da_cidade' => $cidade->nome_da_cidade,
            'latitude' => $cidade->latitude,
            'longitude' => $cidade->longitude,
        ]);

        $response->assertStatus(401);
    }
}
