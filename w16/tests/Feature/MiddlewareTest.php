<?php

namespace Tests\Feature;

use Tests\TestCase;

class MiddlewareTest extends TestCase
{

    public function test_sanctum_cidade()
    {
        $response = $this->json('get', '/api/cidade');
        $response->assertStatus(401);
    }

    public function test_sanctum_posto()
    {
        $response = $this->json('get', '/api/posto');
        $response->assertStatus(401);
    }
}
