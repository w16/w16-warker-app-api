<?php

namespace Tests\Feature;

use App\Models\Posto;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;
use App\Models\User;

class PostosTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Indicates whether the default seeder should run before each test.
     *
     * @var bool
     */
    protected $seed = true;

    public function test_posto_can_be_created()
    {
        $posto = Posto::factory()->make();

        $this->actingAs(User::factory()->create());

        $response = $this->postJson('/api/postos', [
            'cidade_id' => $posto->cidade_id,
            'reservatorio' => $posto->reservatorio,
            'latitude' => $posto->latitude,
            'longitude' => $posto->longitude,
        ]);

        $response->assertStatus(201);
    }

    public function test_posto_with_invalid_city_cannot_be_created()
    {
        $posto = Posto::factory()->make();

        $this->actingAs(User::factory()->create());

        $response = $this->postJson('/api/postos', [
            'cidade_id' => 'invalid_city',
            'reservatorio' => $posto->reservatorio,
            'latitude' => $posto->latitude,
            'longitude' => $posto->longitude,
        ]);

        $response->assertStatus(500);
    }

    public function test_posto_with_invalid_coordinates_cannot_be_created()
    {
        $this->actingAs(User::factory()->create());

        $posto = Posto::factory()->make();

        $response = $this->postJson('/api/postos', [
            'cidade_id' => $posto->cidade_id,
            'reservatorio' => $posto->reservatorio,
            'latitude' => 'invalid_latitude',
            'longitude' => 'invalid_longitude',
        ]);

        $response->assertStatus(500);
    }

    public function test_posto_with_invalid_reservatory_cannot_be_created()
    {
        $this->actingAs(User::factory()->create());

        $posto = Posto::factory()->make();

        $response = $this->postJson('/api/postos', [
            'cidade_id' => $posto->cidade_id,
            'reservatorio' => 200,
            'latitude' => $posto->latitude,
            'longitude' => $posto->longitude,
        ]);

        $response->assertStatus(500);
    }

    public function test_posto_cannot_be_created_without_logged_user()
    {
        $posto = Posto::factory()->make();

        $response = $this->postJson('/api/postos', [
            'cidade_id' => $posto->cidade_id,
            'reservatorio' => $posto->reservatorio,
            'latitude' => $posto->latitude,
            'longitude' => $posto->longitude,
        ]);

        $response->assertStatus(401);
    }
}
