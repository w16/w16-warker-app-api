<?php

namespace Tests\Feature;

use \App\Models\Cidade;

class CidadeTest extends \Tests\TestCase {

    public const ENDPOINT = '/api/cidade';
    public const STRUCTURE = [
        'id',
        'cidade',
        'coords' => [
            'latitude',
            'longitude',
        ],
        'postos' => [
            '*' => PostoTest::STRUCTURE,
        ],
    ];

    protected function makeData() {
        return Cidade::factory()->makeOne()->only(['nome_da_cidade', 'latitude', 'longitude']);
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
     * checkActionById
     *
     * @return void
     */

    /** @test */
    public function checkActionById() {
        $cidade = Cidade::first();

        $this->assignUser();

        $response = $this->json("GET", self::ENDPOINT . '/' . $cidade->id);
        $response->assertStatus(200);
    }

    /**
     * checkCreatedAction
     *
     * @return void
     */

    /** @test */
    public function checkCreatedAction() {
        $cidade = $this->makeData();

        $this->assignUser();

        $response = $this->postJson(self::ENDPOINT, $cidade);
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
        $cidade = Cidade::first();
        $data = [
            "nome_da_cidade" => $cidade->nome_da_cidade,             
            "longitude" => 11,
            "latitude" => 90
        ];
        $this->assignUser();

        $response = $this->putJson(self::ENDPOINT . '/' . $cidade->id, $data);
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
        $cidade = Cidade::first();
        $data = [
            "nome_da_cidade" => null,             
            "longitude" => 22.521255,
            "latitude" => -42.2521253
        ];

        $this->assignUser();

        $response = $this->putJson(self::ENDPOINT . '/' . $cidade->id, $data);
        $response->assertStatus(400);
    }
}
