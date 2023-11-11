<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\SparePartController;

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

Route::post("/auth/login", [AuthController::class, "login"]);

Route::controller(SparePartController::class)->prefix('spare-parts')->group(function () {
    Route::get('', 'list');

    Route::group(['middleware' => ['auth:sanctum']], function () {
        Route::post('', 'create');
        Route::put('{id}', 'update');
        Route::put('{id}/set-featured', 'setAsFeatured');
        Route::delete('{id}', 'delete');
    });

    Route::get('{id}', 'show');
});
