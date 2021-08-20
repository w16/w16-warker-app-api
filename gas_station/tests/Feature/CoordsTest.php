<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CoordsTest extends TestCase
{
    use RefreshDatabase;

    // Test url tha gets all the coordinates 
    public function test_get_all_coordinates()
    {
        $response = $this->get('/api/coordinates');
        $response->assertStatus(200);
    }

    //test add new coordinate
    public function test_add_new_coordinate()
    {
        // fill response with data
        $response = $this->postJson('/api/coordinates', [
            "latitude" => -25.5405,
            "longitude" => -48.3095
        ]);

        // status that should return
        $response->assertStatus(201);
    }


    // test to get by id and to delete a coordinate

    /*
    public function test_get_coords_by_id()
    {
        $response = $this->get('/api/coordinates/1');
        $response->assertStatus(200);
    }
    public function test_delete_coords()
    {
        $response = $this->delete('/api/coordinates/1');
        $response->assertStatus(200);
    }*/
}
