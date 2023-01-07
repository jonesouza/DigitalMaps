<?php

namespace App\Models\Points;

use Illuminate\Database\Eloquent\Model;
use App\Collections\Points\PointCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Point extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'x',
        'y',
        'opened_at',
        'closed_at',
    ];

    public function newCollection(array $models = [])
    {
        return new PointCollection($models);
    }

    
}
