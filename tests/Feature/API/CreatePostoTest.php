<?php

namespace Tests\Feature\API;

use Tests\PostoTest;

class CreatePostoTest extends PostoTest
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
