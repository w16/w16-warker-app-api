<?php

namespace Tests\Feature\API;

use App\Models\User;
use Tests\PostoTest;

class UpdatePostoTest extends PostoTest
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->input = $this->makeRandomInput();
    }
    /** @test */
    public function updateMustFailForGuest()
    {
        $response = $this->putJsonFirst($this->input);

        $response->assertUnauthorized();
    }
    /** @test */
    public function updateMustWorkForAuthenticatedUser()
    {
        $this->assignActingRandomUser();

        $response = $this->putJsonFirst($this->input);

        $response->assertOk();
    }
}
