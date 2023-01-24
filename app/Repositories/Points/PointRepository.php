<?php

namespace App\Repositories\Points;

use App\Models\Points\Point;
use App\Repositories\Repository;
use App\Contracts\Repositories\Points\PointRepositoryContract;

class PointRepository extends Repository implements PointRepositoryContract
{
    public function __construct(Point $point)
    {
        $this->model = $point;
    }

    public function findNear(int $x, int $y, int $distance)
    {
        $points = $this->model->whereNear($x, $y, $distance)
                              ->get();

        return $points;
    }

    public function hasInPosition(int $x, int $y)
    {
        $point = $this->model->where('x', $x)
                             ->where('y', $y)
                             ->first();

        return $point;
    }
}
