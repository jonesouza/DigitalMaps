<?php

namespace Tests\Unit\Points;

use Exception;
use TypeError;
use PHPUnit\Framework\TestCase;
use App\DataTransferObjects\Points\PointSaveData;

class PointSaveDataTest extends TestCase
{
    public function test_point_save_data()
    {
        $pointDto = new PointSaveData([
            'name' => 'Test Point',
            'x' => 1,
            'y' => 1,
            'opened_at' => '14:00',
            'closed_at' => '23:00',
        ]);

        $this->assertEquals($pointDto->name, 'Test Point');
        $this->assertEquals($pointDto->x, 1);
        $this->assertEquals($pointDto->y, 1);
        $this->assertEquals($pointDto->opened_at, '14:00');
        $this->assertEquals($pointDto->closed_at, '23:00');
    }

    public function test_point_save_data_with_null_opened_at_and_closed_at()
    {
        $pointDto = new PointSaveData([
            'name' => 'Test Point',
            'x' => 1,
            'y' => 1
        ]);

        $this->assertEquals($pointDto->name, 'Test Point');
        $this->assertEquals($pointDto->x, 1);
        $this->assertEquals($pointDto->y, 1);
        $this->assertNull($pointDto->opened_at);
        $this->assertNull($pointDto->closed_at);
    }

    public function test_point_save_data_with_invalid_name()
    {
        $this->expectException(TypeError::class);

        $pointDto = new PointSaveData([
            'name' => null,
            'x' => 1,
            'y' => 1,
            'opened_at' => '14:00',
            'closed_at' => '23:00',
        ]);
    }

    public function test_point_save_data_with_invalid_x()
    {
        $this->expectException(\Exception::class);

        $pointDto = new PointSaveData([
            'name' => 'Test Point',
            'x' => -1,
            'y' => 1,
            'opened_at' => '14:00',
            'closed_at' => '23:00',
        ]);
    }

    public function test_point_save_data_with_invalid_y()
    {
        $this->expectException(\Exception::class);

        $pointDto = new PointSaveData([
            'name' => 'Test Point',
            'x' => 1,
            'y' => -1,
            'opened_at' => '14:00',
            'closed_at' => '23:00',
        ]);
    }

    public function test_point_save_data_with_invalid_opened_at()
    {
        $this->expectException(\Exception::class);

        $pointDto = new PointSaveData([
            'name' => 'Test Point',
            'x' => 1,
            'y' => 1,
            'opened_at' => '14:00:00',
            'closed_at' => '23:00',
        ]);
    }

    public function test_point_save_data_with_invalid_closed_at()
    {
        $this->expectException(\Exception::class);

        $pointDto = new PointSaveData([
            'name' => 'Test Point',
            'x' => 1,
            'y' => 1,
            'opened_at' => '14:00',
            'closed_at' => 'asdasd',
        ]);
    }
}
