<?php

namespace App\DataTransferObjects\Points;

use Spatie\DataTransferObject\DataTransferObject;

class PointSaveData extends DataTransferObject
{
    public string $name;
    public float $x;
    public float $y;
    public ?string $opened_at;
    public ?string $closed_at;
}