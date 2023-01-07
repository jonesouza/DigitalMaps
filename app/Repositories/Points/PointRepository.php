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
}
