<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;

abstract class TestCase extends BaseTestCase {

    use CreatesApplication;

    protected function assignUser() {
        Sanctum::actingAs(\App\Models\User::factory()->create());
        
        $this->withoutExceptionHandling();
    }

}
