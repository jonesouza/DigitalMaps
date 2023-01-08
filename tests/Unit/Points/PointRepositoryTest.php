<?php

namespace Tests\Unit\Points;

use PHPUnit\Framework\TestCase;
use App\Repositories\Repository;
use App\Repositories\Points\PointRepository;
use App\Contracts\Repositories\Points\PointRepositoryContract;

class PointRepositoryTest extends TestCase
{
    public function test_if_repository_implements_interface_correctly()
    {
        $pointRepository = app(PointRepository::class);

        $this->assertInstanceOf(PointRepositoryContract::class, $pointRepository);
    }

    public function test_repository_has_methoed_find_all()
    {
        $pointRepository = app(PointRepository::class);

        $this->assertTrue(method_exists($pointRepository, 'findAll'));
    }

    public function test_repository_has_methoed_find_by_id()
    {
        $pointRepository = app(PointRepository::class);

        $this->assertTrue(method_exists($pointRepository, 'findById'));
    }

    public function test_repository_has_methoed_create()
    {
        $pointRepository = app(PointRepository::class);

        $this->assertTrue(method_exists($pointRepository, 'create'));
    }

    public function test_repository_has_methoed_update()
    {
        $pointRepository = app(PointRepository::class);

        $this->assertTrue(method_exists($pointRepository, 'update'));
    }

    public function test_repository_has_methoed_delete()
    {
        $pointRepository = app(PointRepository::class);

        $this->assertTrue(method_exists($pointRepository, 'delete'));
    }

    public function test_repository_has_methoed_find_near()
    {
        $pointRepository = app(PointRepository::class);

        $this->assertTrue(method_exists($pointRepository, 'findNear'));
    }
}
