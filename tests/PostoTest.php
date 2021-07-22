<?php

namespace Tests;

use App\Models\Posto;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\Traits\CommonApiCalls;

class PostoTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;
    use CommonApiCalls;

    public const API_ENDPOINT = '/api/posto';
    public const API_STRUCTURE = [
        'id',
        'reservatorio',
        'coords' => [
            'latitude',
            'longitude',
        ],
        'updated_at',
        'created_at',
    ];

    protected function makeRandomInput()
    {
        return Posto::factory()->makeOne()->only(['cidade_id', 'reservatorio', 'latitude', 'longitude']);
    }
    
    protected function setUp(): void
    {
        parent::setUp();

        $this->seed('DatabaseSeeder');
    }
}
