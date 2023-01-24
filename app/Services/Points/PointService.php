<?php

namespace App\Services\Points;

use App\Contracts\Repositories\Points\PointRepositoryContract;
use App\DataTransferObjects\Points\PointNearData;
use App\DataTransferObjects\Points\PointSaveData;
use App\Exceptions\Points\DuplicatedPointException;

class PointService
{
    protected PointRepositoryContract $pointRepository;

    public function __construct(PointRepositoryContract $pointRepository)
    {
        $this->pointRepository = $pointRepository;
    }

    public function index()
    {
        return $this->pointRepository->findAll();
    }

    public function store(PointSaveData $data)
    {
        $this->validatePoint($data);

        return $this->pointRepository->create($data->toArray());
    }

    public function show(int $id)
    {
        return $this->pointRepository->findById($id);
    }

    public function update(int $id, PointSaveData $data)
    {
        $this->validatePoint($data);
        
        return $this->pointRepository->update($id, $data->toArray());
    }

    public function destroy(int $id)
    {
        $this->pointRepository->delete($id);
    }

    public function near(PointNearData $data)
    {
        return $this->pointRepository->findNear(
            $data->x, 
            $data->y, 
            $data->distance
        );
    }

    protected function validatePoint(PointSaveData $data)
    {
        if($this->pointRepository->hasInPosition($data->x, $data->y))
        {
            throw new DuplicatedPointException('Point already exists in this position');
        }
    }
}
