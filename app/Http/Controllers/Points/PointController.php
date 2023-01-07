<?php

namespace App\Http\Controllers\Points;

use App\Http\Controllers\Controller;
use App\Services\Points\PointService;
use App\Http\Requests\Points\PointNearRequest;
use App\Http\Requests\Points\PointSaveRequest;
use App\Http\Resources\Points\PointNearResource;
use App\DataTransferObjects\Points\PointNearData;
use App\DataTransferObjects\Points\PointSaveData;

class PointController extends Controller
{
    protected PointService $pointService;

    public function __construct(PointService $pointService)
    {
        $this->pointService = $pointService;
    }

    public function index()
    {
        $points = $this->pointService->index();

        return response()->json($points);
    }

    public function store(PointSaveRequest $request)
    {
        $pointSaveData = new PointSaveData($request->validated());

        $point = $this->pointService->store($pointSaveData);

        return response()->json($point, 201);
    }

    public function show(int $point)
    {
        $point = $this->pointService->show($point);

        return response()->json($point);
    }

    public function near(PointNearRequest $request)
    {
        $pointNearData = new PointNearData($request->validated());

        $points = $this->pointService->near($pointNearData);

        $pointsResource = PointNearResource::collection($points);

        return response()->json($pointsResource);
    }

    public function update(PointSaveRequest $request, int $point)
    {
        $pointSaveData = new PointSaveData($request->validated());

        $point = $this->pointService->update($point, $pointSaveData);

        return response()->json($point);
    }

    public function destroy(int $point)
    {
        $this->pointService->destroy($point);

        return response()->json(null, 204);
    }


}
