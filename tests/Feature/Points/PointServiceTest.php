<?php

namespace Tests\Feature\Points;

use Tests\TestCase;
use App\Models\Points\Point;
use App\Services\Points\PointService;
use App\Collections\Points\PointCollection;
use Illuminate\Foundation\Testing\WithFaker;
use App\DataTransferObjects\Points\PointSaveData;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PointServiceTest extends TestCase
{
    use RefreshDatabase, DatabaseMigrations;

    public function test_index_points()
    {
        Point::factory()->count(10)->create();

        $pointService = app()->make(PointService::class);

        $points = $pointService->index();
        
        $this->assertInstanceOf(PointCollection::class, $points);
        $this->assertEquals(10, $points->count());
    }

    public function test_store_point()
    {
        $pointService = app()->make(PointService::class);

        $pointSaveData = new PointSaveData([
            'name' => 'Point 1',
            'x' => 1,
            'y' => 1,
            'opened_at' => '08:00',
            'closed_at' => '18:00',
        ]);

        $point = $pointService->store($pointSaveData);

        $this->assertInstanceOf(Point::class, $point);
        $this->assertEquals('Point 1', $point->name);
        $this->assertEquals(1, $point->x);
        $this->assertEquals(1, $point->y);
        $this->assertEquals('08:00', $point->opened_at);
        $this->assertEquals('18:00', $point->closed_at);
    }

    public function test_store_point_with_null_opened_at_and_closed_at()
    {
        $pointService = app()->make(PointService::class);

        $pointSaveData = new PointSaveData([
            'name' => 'Point 1',
            'x' => 1,
            'y' => 1,
        ]);

        $point = $pointService->store($pointSaveData);

        $this->assertInstanceOf(Point::class, $point);
        $this->assertEquals('Point 1', $point->name);
        $this->assertEquals(1, $point->x);
        $this->assertEquals(1, $point->y);
        $this->assertNull($point->opened_at);
        $this->assertNull($point->closed_at);
    }

    public function test_show_point()
    {
        $pointFactory = Point::factory()->create();

        $pointService = app()->make(PointService::class);

        $point = $pointService->show($pointFactory->id);

        $this->assertInstanceOf(Point::class, $point);
        $this->assertEquals($pointFactory->name, $point->name);
        $this->assertEquals($pointFactory->x, $point->x);
        $this->assertEquals($pointFactory->y, $point->y);
        $this->assertEquals($pointFactory->opened_at, $point->opened_at);
        $this->assertEquals($pointFactory->closed_at, $point->closed_at);
    }

    public function test_update_point()
    {
        $point = Point::factory()->create();

        $pointService = app()->make(PointService::class);

        $pointSaveData = new PointSaveData([
            'name' => 'Point 1',
            'x' => 1,
            'y' => 1,
            'opened_at' => '08:00',
            'closed_at' => '18:00',
        ]);

        $point = $pointService->update($point->id, $pointSaveData);

        $this->assertInstanceOf(Point::class, $point);
        $this->assertEquals('Point 1', $point->name);
        $this->assertEquals(1, $point->x);
        $this->assertEquals(1, $point->y);
        $this->assertEquals('08:00', $point->opened_at);
        $this->assertEquals('18:00', $point->closed_at);
    }

    public function test_delete_point()
    {
        $point = Point::factory()->create();

        $pointService = app()->make(PointService::class);

        $pointService->destroy($point->id);

        $this->assertDatabaseMissing('points', [
            'id' => $point->id,
        ]);
    }

    
}
