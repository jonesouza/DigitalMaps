<?php

namespace App\Http\Controllers\Points;

use App\DataTransferObjects\Points\PointSaveData;
use App\Http\Controllers\Controller;
use App\Services\Points\PointService;
use App\Http\Requests\Points\PointSaveRequest;
use Carbon\Carbon;

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
