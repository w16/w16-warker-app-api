<?php

namespace Tests\Feature;

use Tests\TestCase;
use \App\Models\Posto;
use \App\Models\Cidade;

class PostoTest extends TestCase {

    public const ENDPOINT = '/api/posto';
    public const STRUCTURE = [
        'id',
        'reservatorio',
        'coords' => [
            'latitude',
            'longitude',
        ],
        'updated_at',
        'created_at',
    ];

    protected function makeData() {
        return Posto::factory()->makeOne()->only(['cidade_id', 'reservatorio', 'latitude', 'longitude']);
    }

    /**
     * checkAuthorizedAction
     *
     * @return void
     */

    /** @test */
    public function checkAuthorizedAction() {
        $this->assignUser();

        $response = $this->json("GET", self::ENDPOINT);
        $response->assertStatus(200);
    }

    /**
     * checkUnauthorizedAction
     *
     * @return void
     */

    /** @test */
    public function checkUnauthorizedAction() {
        $response = $this->json("GET", self::ENDPOINT);
        $response->assertStatus(401);
    }

    /**
     * checkStructureActionById
     *
     * @return void
     */

    /** @test */
    public function checkStructureActionById() {
        $posto = Posto::first();

        $this->assignUser();

        $response = $this->json("GET", self::ENDPOINT . '/' . $posto->id);
        $response->assertStatus(200);
        $response->assertJsonStructure(self::STRUCTURE);
    }

    /**
     * checkCreatedAction
     *
     * @return void
     */

    /** @test */
    public function checkCreatedAction() {
        $cidade = Cidade::first();
        $posto = $this->makeData();
        $posto['cidade_id'] = $cidade->id;

        $this->assignUser();

        $response = $this->postJson(self::ENDPOINT, $posto);
        $response->assertStatus(201);
        $response->assertJsonStructure(self::STRUCTURE);
    }

    /**
     * checkCreatedFailAction
     *
     * @return void
     */

    /** @test */
    public function checkCreatedFailAction() {
        $this->assignUser();

        $response = $this->postJson(self::ENDPOINT, []);
        $response->assertStatus(400);
    }

    /**
     * checkUpdatedAction
     *
     * @return void
     */

    /** @test */
    public function checkUpdatedAction() {
        $posto = Posto::first();
        $data = [
            "cidade_id" => $posto->cidade_id,
            "reservatorio" => 50,
            "longitude" => 22.521255,
            "latitude" => -42.2521253
        ];
        $this->assignUser();

        $response = $this->putJson(self::ENDPOINT . '/' . $posto->id, $data);
        $response->assertStatus(200);
        $response->assertJsonStructure(self::STRUCTURE);
    }

    /**
     * checkUpdatedFailAction
     *
     * @return void
     */

    /** @test */
    public function checkUpdatedFailAction() {
        $posto = Posto::first();
        $data = [
            "cidade_id" => null,
            "reservatorio" => null,
            "longitude" => 22.521255,
            "latitude" => -42.2521253
        ];

        $this->assignUser();

        $response = $this->putJson(self::ENDPOINT . '/' . $posto->id, $data);
        $response->assertStatus(400);
    }

}
