<?php

namespace Tests\Feature\API;

use App\Models\User;
use Tests\CidadeTest;

class GetCidadeTest extends CidadeTest
{
    /** @test */
    public function getAllMustFailForGuest()
    {
        $response = $this->getJsonAll();

        $response->assertUnauthorized();
        $response->assertJsonStructure(['message']);
    }
    /** @test */
    public function getAllMustWorkForAuthenticatedUser()
    {
        $this->assignActingRandomUser();

        $response = $this->getJsonAll();

        $response->assertOk();
        $response->assertJsonStructure(['*' => self::API_STRUCTURE]);
    }
    /** @test */
    public function getIdMustFailForGuest()
    {
        $response = $this->getJsonFirst();

        $response->assertUnauthorized();
        $response->assertJsonStructure(['message']);
    }
    /** @test */
    public function getIdMustWorkForAuthenticatedUser()
    {
        $this->assignActingRandomUser();

        $response = $this->getJsonFirst();

        $response->assertOk();
        $response->assertJsonStructure(self::API_STRUCTURE);
    }
}
