<?php

namespace App\DataTransferObjects\Points;

use Spatie\DataTransferObject\DataTransferObject;

class PointNearData extends DataTransferObject
{
    public int $x;
    public int $y;
    public int $distance;
    public string $hour;
}
