<?php

use App\Http\Controllers\AdController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/ads', [AdController::class, 'store']);
    Route::put('/ads/{ad}', [AdController::class, 'update']);
    Route::delete('/ads/{ad}', [AdController::class, 'destroy']);
});
