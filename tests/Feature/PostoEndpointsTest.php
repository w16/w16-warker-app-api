<?php

namespace Tests\Feature;

use App\Models\Posto;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use App\Models\User;

class PostoEndpointsTest extends TestCase
{
    use RefreshDatabase;

    public function test_posto_can_be_created()
    {
        $posto = Posto::factory()->make();

        Sanctum::actingAs(User::factory()->create());

        $response = $this->postJson('/api/posto', [
            'cidade_id' => $posto->cidade_id,
            'reservatorio' => $posto->reservatorio,
            'lat' => $posto->latitude,
            'lng' => $posto->longitude,
        ]);

        $response->assertStatus(201);
    }

    public function test_posto_with_invalid_cidade_cannot_be_created()
    {
        $posto = Posto::factory()->make();

        Sanctum::actingAs(User::factory()->create());

        $response = $this->postJson('/api/posto', [
            'cidade_id' => -123,
            'reservatorio' => $posto->reservatorio,
            'lat' => $posto->latitude,
            'lng' => $posto->longitude,
        ]);

        $response->assertStatus(422);
    }

    public function test_posto_with_invalid_location_cannot_be_created()
    {
        Sanctum::actingAs(User::factory()->create());

        $posto = Posto::factory()->make();

        $response = $this->postJson('/api/posto', [
            'cidade_id' => $posto->cidade_id,
            'reservatorio' => $posto->reservatorio,
            'lat' => '-abc',
            'lng' => 'abc',
        ]);

        $response->assertStatus(422);
    }

    public function test_posto_with_distant_location_cannot_be_created()
    {
        Sanctum::actingAs(User::factory()->create());

        $posto = Posto::factory()->make();

        $response = $this->postJson('/api/posto', [
            'cidade_id' => $posto->cidade_id,
            'reservatorio' => $posto->reservatorio,
            'lng' => $posto->latitude+6,
            'lat' => $posto->longitude+6,
        ]);

        $response->assertStatus(422);
    }

    public function test_posto_with_invalid_reservatorio_cannot_be_created()
    {
        Sanctum::actingAs(User::factory()->create());

        $posto = Posto::factory()->make();

        //Testa se pode acima de 100
        $posto->reservatorio = 200;

        $response = $this->postJson('/api/posto', [
            'cidade_id' => $posto->cidade_id,
            'reservatorio' => $posto->reservatorio,
            'lat' => $posto->latitude,
            'lng' => $posto->longitude,
        ]);

        $response->assertStatus(422);

        //Testa se pode acima de menos de 0
        $posto->reservatorio = -1;

        $response = $this->postJson('/api/posto', [
            'cidade_id' => $posto->cidade_id,
            'reservatorio' => $posto->reservatorio,
            'lat' => $posto->latitude,
            'lng' => $posto->longitude,
        ]);

        $response->assertStatus(422);
    }
}
