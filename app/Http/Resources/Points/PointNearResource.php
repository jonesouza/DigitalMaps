<?php

namespace App\Http\Resources\Points;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class PointNearResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'x' => $this->x,
            'y' => $this->y,
            'opened_at' => $this->opened_at,
            'closed_at' => $this->closed_at,
            'is_opened' => $this->isOpen(Carbon::parse($request->get('hour'))),
        ];
    }
}
