<?php

namespace App\DataTransferObjects\Points;

use Spatie\DataTransferObject\DataTransferObject;
use App\DataTransferObjects\Points\Attributes\Hour;
use App\DataTransferObjects\Points\Attributes\NumberBetween;

class PointSaveData extends DataTransferObject
{
    public string $name;

    #[NumberBetween(0, 4294967295)]
    public int $x;

    #[NumberBetween(0, 4294967295)]
    public int $y;

    #[Hour]
    public string $opened_at;
    
    #[Hour]
    public string $closed_at;
}