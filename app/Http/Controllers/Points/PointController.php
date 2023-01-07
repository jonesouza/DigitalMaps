<?php

namespace App\Http\Controllers\Points;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Points\PointService;
use App\Http\Requests\Points\PointStoreRequest;

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

    public function store(PointStoreRequest $request)
    {
        // $point = $this->pointService->store($request->all());

        // return response()->json($point);
    }


}
