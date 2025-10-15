<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\GameTurnController;

Route::get("/game-turns", [GameTurnController::class, "index"]);
