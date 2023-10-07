<?php

use App\Http\Controllers\api\SanctumAuthController;
use App\Http\Controllers\api\v1\TicketController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/sanctum/token', [SanctumAuthController::class, 'store']);

Route::prefix('v1')->group(function () {

    Route::prefix('tickets')->middleware('auth:sanctum')->group(function () {
        Route::get('/show/{uuid}', [TicketController::class, 'show']);
        Route::get('/list', [TicketController::class, 'index']);
        Route::post('/create', [TicketController::class, 'store']);
        Route::put('/update/{ticket}', [TicketController::class, 'update']);
        Route::delete('/delete/{ticket}', [TicketController::class, 'delete']);
    });
});
