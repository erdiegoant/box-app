<?php

use App\Http\Controllers\Api\BoxesController;
use App\Http\Controllers\Api\CustomerController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'boxes'], function () {
    Route::get('/', [BoxesController::class, 'index']);
    Route::post('/', [BoxesController::class, 'store']);
    Route::get('{uuid}', [BoxesController::class, 'details']);
});

Route::get('customer/{document}', [CustomerController::class, 'detail']);
