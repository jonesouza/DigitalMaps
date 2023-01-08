<?php

namespace App\DataTransferObjects\Points;

use Spatie\DataTransferObject\DataTransferObject;
use App\DataTransferObjects\Points\Attributes\Hour;
use App\DataTransferObjects\Points\Attributes\NumberBetween;

class PointNearData extends DataTransferObject
{
    #[NumberBetween(0, 4294967295)]
    public int $x;

    #[NumberBetween(0, 4294967295)]
    public int $y;

    public int $distance;

    #[Hour]
    public string $hour;
}
