<?php

namespace Tests\Feature\API;

use App\Models\User;
use Tests\CidadeTest;

class RemoveCidadeTest extends CidadeTest
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
