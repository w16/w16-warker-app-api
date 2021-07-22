<?php

namespace Tests;

use App\Models\Cidade;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\Traits\CommonApiCalls;

class CidadeTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;
    use CommonApiCalls;

    public const API_ENDPOINT = '/api/cidade';
    public const API_STRUCTURE = [
        'id',
        'cidade',
        'coords' => [
            'latitude',
            'longitude',
        ],
        'postos' => [
            '*' => PostoTest::API_STRUCTURE,
        ],
    ];

    protected function makeRandomInput()
    {
        return Cidade::factory()->makeOne()->only(['nome_da_cidade', 'latitude', 'longitude']);
    }

    protected function setUp(): void
    {
        parent::setUp();

        Cidade::factory()->create();
    }
}
