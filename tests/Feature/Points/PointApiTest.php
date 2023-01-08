<?php

namespace Tests\Feature\Points;

use Carbon\Carbon;
use Tests\TestCase;
use App\Models\Points\Point;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PointApiTest extends TestCase
{
    use DatabaseMigrations, RefreshDatabase;

    public function test_index_points()
    {
        $response = $this->get('/api/points');

        $response->assertStatus(200);
    }

    public function test_create_point()
    {
        $data = [
            'name' => 'Test Point',
            'x' => 1,
            'y' => 1,
            'opened_at' => '14:00',
            'closed_at' => '23:00',
        ];

        $response = $this->post('/api/points',$data );

        $response->assertStatus(201);

        $this->assertDatabaseHas('points', $data);
    }

    public function test_show_point()
    {
        $point = Point::factory()->create();

        $response = $this->get('/api/points/' . $point->id);

        $response->assertStatus(200);

        $response->assertJson([
            'id' => $point->id,
            'name' => $point->name,
            'x' => $point->x,
            'y' => $point->y,
            'opened_at' => $point->opened_at,
            'closed_at' => $point->closed_at,
        ]);
    }

    public function test_update_point()
    {
        $point = Point::factory()->create();

        $data = [
            'name' => 'Test Point',
            'x' => 1,
            'y' => 1,
            'opened_at' => '14:00',
            'closed_at' => '23:00',
        ];

        $response = $this->put('/api/points/' . $point->id, $data);

        $response->assertStatus(200);

        $this->assertDatabaseHas('points', $data);
    }

    public function test_delete_point()
    {
        $point = Point::factory()->create();

        $response = $this->delete('/api/points/' . $point->id);

        $response->assertStatus(204);

        $this->assertDatabaseMissing('points', [
            'id' => $point->id,
            'name' => $point->name,
            'x' => $point->x,
            'y' => $point->y,
        ]);
    }

    public function test_find_near_points()
    {
        $point = Point::factory()->create();

        $data = [
            'x' => $point->x,
            'y' => $point->y,
            'distance' => 10,
            'hour' => Carbon::parse($point->opened_at)->format('H:i'),
        ];

        $response = $this->get('/api/points/near/?' . http_build_query($data));

        $response->assertStatus(200);

        $response->assertJsonCount(1);
    }

    public function test_find_near_points_empty()
    {
        $point = Point::factory()->create();

        $data = [
            'x' => 200,
            'y' => 200,
            'distance' => 10,
            'hour' => '00:00',
        ];

        $response = $this->get('/api/points/near/?' . http_build_query($data));

        $response->assertStatus(200);

        $response->assertJsonCount(0);
    }
}
