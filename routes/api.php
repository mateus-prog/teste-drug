<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\GroupController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\UserController;

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

Route::prefix('v1')->group(function(){
    Route::post('/login', [AuthController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout']);
        //group
        Route::get('/group', [GroupController::class, 'index']);
        Route::get('/group/{group}', [GroupController::class, 'show'])->middleware('ability:read-group');
        Route::post('/group', [GroupController::class, 'store'])->middleware('ability:create-group');
        Route::get('/group/{group}/edit', [GroupController::class, 'edit'])->middleware('ability:edit-group');
        Route::put('/group/{group}', [GroupController::class, 'update'])->middleware('ability:edit-group');
        Route::delete('/group/{group}', [GroupController::class, 'destroy'])->middleware('ability:delete-group');

        //client
        Route::get('/client', [ClientController::class, 'index']);
        Route::get('/client/{client}', [ClientController::class, 'show']);
        Route::post('/client', [ClientController::class, 'store'])->middleware('ability:create-client');
        Route::delete('/client/{client}', [ClientController::class, 'destroy'])->middleware('ability:delete-client');

        //user
        Route::apiResource('user', UserController::class);
        Route::get('/user/{user}/edit', [UserController::class, 'edit']);
    });
});
