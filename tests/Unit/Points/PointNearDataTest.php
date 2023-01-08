<?php

namespace Tests\Unit\Points;

use PHPUnit\Framework\TestCase;
use App\DataTransferObjects\Points\PointNearData;

class PointNearDataTest extends TestCase
{
    public function test_near_data()
    {
        $nearDto = new PointNearData([
            'x' => 1,
            'y' => 1,
            'distance' => 10,
            'hour' => '14:00'
        ]);

        $this->assertEquals($nearDto->x, 1);
        $this->assertEquals($nearDto->y, 1);
        $this->assertEquals($nearDto->distance, 10);
        $this->assertEquals($nearDto->hour, '14:00');
    }

    public function test_near_data_with_invalid_x()
    {
        $this->expectException(\Exception::class);

        $nearDto = new PointNearData([
            'x' => -1,
            'y' => 1,
            'distance' => 10,
            'hour' => '14:00'
        ]);
    }

    public function test_near_data_with_invalid_y()
    {
        $this->expectException(\Exception::class);

        $nearDto = new PointNearData([
            'x' => 1,
            'y' => -1,
            'distance' => 10,
            'hour' => '14:00'
        ]);
    }

    public function test_near_data_with_invalid_hour()
    {
        $this->expectException(\Exception::class);

        $nearDto = new PointNearData([
            'x' => 1,
            'y' => 1,
            'distance' => 10,
            'hour' => '25:00'
        ]);
    }

    
}
