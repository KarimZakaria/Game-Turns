<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\GameTurnService;
use App\Http\Requests\GameTurnRequest;
use App\Http\Resources\GameTurnResource;
use App\Traits\GameTurnApiResponseTrait;


class GameTurnController extends Controller
{
    use GameTurnApiResponseTrait;
    protected $service;

    public function __construct(GameTurnService $service)
    {
        $this->service = $service;
    }

    public function index(GameTurnRequest $request)
    {
        $data = $request->validated();

        $result = $this->service->generateExecution($data);

        return $this->successResponse(new GameTurnResource($result));

    }
}
