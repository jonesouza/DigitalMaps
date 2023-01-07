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

    protected $cast = [
        'opened_at' => 'datetime:H:i',
        'closed_at' => 'datetime:H:i',
    ];

    public function newCollection(array $models = [])
    {
        return new PointCollection($models);
    }

    public function getIsOpenedAttribute()
    {
        $now = now()->format('H:i');

        return $this->isOpen($now);
    }

    public function scopeWhereNear($query, int $x, int $y, int $distance)
    {
        return $query->where('x', '>=', $x - $distance)
                    ->where('x', '<=', $x + $distance)
                    ->where('y', '>=', $y - $distance)
                    ->where('y', '<=', $y + $distance);
    }

    public function isOpen($now)
    {
        if ($this->opened_at === null && $this->closed_at === null) {
            return true;
        }

        if ($this->opened_at === null && $this->closed_at !== null) {
            return $now < $this->closed_at;
        }

        if ($this->opened_at !== null && $this->closed_at === null) {
            return $now > $this->opened_at;
        }

        return $now > $this->opened_at && $now < $this->closed_at;
    }

    
}
