<?php

namespace Tests\Feature\Points;

use Tests\TestCase;
use App\Models\Points\Point;
use App\Repositories\Repository;
use App\Repositories\Points\PointRepository;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Contracts\Repositories\Points\PointRepositoryContract;

class PointRepositoryTest extends TestCase
{
    use DatabaseMigrations, RefreshDatabase;

    public function test_find_all_points()
    {
        Point::factory()->count(10)->create();

        $pointRepository = $this->app->make(PointRepository::class);

        $points = $pointRepository->findAll();

        $this->assertCount(10, $points);
    }

    public function test_find_point_by_id()
    {
        $point = Point::factory()->create();

        $pointRepository = $this->app->make(PointRepository::class);

        $point = $pointRepository->findById($point->id);

        $this->assertNotNull($point);

        $this->assertEquals($point->id, $point->id);
        $this->assertEquals($point->x, $point->x);
        $this->assertEquals($point->y, $point->y);
        $this->assertEquals($point->created_at, $point->created_at);
        $this->assertEquals($point->updated_at, $point->updated_at);
    }

    public function test_create_point()
    {
        $pointRepository = $this->app->make(PointRepository::class);

        $point = $pointRepository->create([
            'name' => 'Test Point',
            'x' => 1,
            'y' => 1,
            'opened_at' => '2021-01-01 00:00:00',
            'closed_at' => '2021-01-01 00:00:00',
        ]);

        $this->assertNotNull($point);

        $this->assertEquals($point->name, 'Test Point');
        $this->assertEquals($point->x, 1);
        $this->assertEquals($point->y, 1);
        $this->assertEquals($point->opened_at, '2021-01-01 00:00:00');
        $this->assertEquals($point->closed_at, '2021-01-01 00:00:00');
    }

    public function test_update_point()
    {
        $point = Point::factory()->create();

        $pointRepository = $this->app->make(PointRepository::class);

        $point = $pointRepository->update($point->id, [
            'name' => 'Test Point',
            'x' => 1,
            'y' => 1,
            'opened_at' => '2021-01-01 00:00:00',
            'closed_at' => '2021-01-01 00:00:00',
        ]);

        $this->assertNotNull($point);

        $this->assertEquals($point->name, 'Test Point');
        $this->assertEquals($point->x, 1);
        $this->assertEquals($point->y, 1);
        $this->assertEquals($point->opened_at, '2021-01-01 00:00:00');
        $this->assertEquals($point->closed_at, '2021-01-01 00:00:00');
    }

    public function test_delete_point()
    {
        $point = Point::factory()->create();

        $pointRepository = $this->app->make(PointRepository::class);

        $point = $pointRepository->create([
            'name' => 'Test Point',
            'x' => 200,
            'y' => 200,
            'opened_at' => '2021-01-01 00:00:00',
            'closed_at' => '2021-01-01 00:00:00',
        ]);

        $point = $pointRepository->delete($point->id);

        $this->assertTrue($point);
    }

    public function test_find_near_points()
    {
        Point::factory()->count(10)->create();

        $pointRepository = $this->app->make(PointRepository::class);

        $points = $pointRepository->findNear(0, 0, 100);

        $this->assertCount(10, $points);
    }

    public function test_find_near_points_empty()
    {
        Point::factory()->count(10)->create();

        $pointRepository = $this->app->make(PointRepository::class);

        $points = $pointRepository->findNear(200, 200, 10);

        $this->assertCount(0, $points);
    }

    
}
