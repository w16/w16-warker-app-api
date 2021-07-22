<?php

namespace Tests\Traits;

use App\Models\User;

trait CommonApiCalls
{
    protected function getEndpointFirst()
    {
        return self::API_ENDPOINT . '/1';
    }

    protected function assignActingRandomUser()
    {
        $this->actingAs(User::factory()->createOne());
    }

    protected function getJsonAll()
    {
        return $this->getJson(self::API_ENDPOINT);
    }

    protected function getJsonFirst()
    {
        return $this->getJson($this->getEndpointFirst());
    }

    protected function putJsonFirst($input)
    {
        return $this->putJson($this->getEndpointFirst(), $input);
    }

    protected function postJsonUsing($input = [])
    {
        return $this->postJson(self::API_ENDPOINT, $input);
    }

    protected function deleteJsonFirst()
    {
        return $this->deleteJson($this->getEndpointFirst());
    }
}
