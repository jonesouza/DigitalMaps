<?php

namespace App\Contracts\Repositories\Points;

interface PointRepositoryContract
{
    public function findAll();

    public function findById(int $id);

    public function create(array $data);

    public function update(int $id, array $data);

    public function delete(int $id);

    public function findNear(int $x, int $y, int $distance);

    public function hasInPosition(int $x, int $y);
}
