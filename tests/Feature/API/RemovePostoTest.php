<?php

namespace Tests\Feature\API;

use App\Models\User;
use Tests\PostoTest;

class RemovePostoTest extends PostoTest
{
    /** @test */
    public function removeMustFailForGuest()
    {
        $response = $this->deleteJsonFirst();

        $response->assertUnauthorized();
    }
    /** @test */
    public function removeMustWorkForAuthenticatedUser()
    {
        $this->assignActingRandomUser();

        $response = $this->deleteJsonFirst();

        $response->assertNoContent();
    }
}
