<?php

namespace App\Models\Points;

use Illuminate\Database\Eloquent\Model;
use App\Collections\Points\PointCollection;
use Carbon\Carbon;
use DateTimeInterface;
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

    protected $cast = [
        'opened_at' => 'datetime:H:i',
        'closed_at' => 'datetime:H:i',
    ];

    protected $dates = [
		'created_at',
		'updated_at',
	];

    public function newCollection(array $models = [])
    {
        return new PointCollection($models);
    }

    public function scopeWhereNear($query, int $x, int $y, int $distance)
    {
        return $query->where('x', '>=', $x - $distance)
                    ->where('x', '<=', $x + $distance)
                    ->where('y', '>=', $y - $distance)
                    ->where('y', '<=', $y + $distance);
    }

    public function isOpen(\DateTimeInterface $now)
    {
        if ($this->opened_at === null && $this->closed_at === null) 
        {
            return true;
        }

        return isOpened($now, $this->opened_at, $this->closed_at);
    }
    

    
}
