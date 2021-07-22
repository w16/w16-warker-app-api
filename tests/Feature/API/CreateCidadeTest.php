<?php

namespace Tests\Feature\API;

use App\Models\User;
use Tests\CidadeTest;

class CreateCidadeTest extends CidadeTest
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->input = $this->makeRandomInput();
    }
    /** @test */
    public function createMustFailForGuest()
    {
        $response = $this->postJsonUsing($this->input);

        $response->assertUnauthorized();
        $response->assertJsonStructure(['message']);
    }
    /** @test */
    public function createMustWorkForAuthenticatedUser()
    {
        $this->assignActingRandomUser();

        $response = $this->postJsonUsing($this->input);

        $response->assertCreated();
        $response->assertJsonStructure(self::API_STRUCTURE);
    }
}
