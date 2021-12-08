<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\DeliveryController;

Route::post('register', [CustomerController::class, 'register']);
Route::post('login', [CustomerController::class, 'login']);

// put all api protected routes here
Route::middleware('auth:api')->group(function () {
    Route::post('user-detail', [CustomerController::class, 'userDetail']);
    Route::post('logout', [CustomerController::class, 'logout']);
    Route::post('request/pickup', [DeliveryController::class, 'createRequest']);
});


Route::post('agent/register', [AgentController::class, 'register']);
Route::post('agent/login', [AgentController::class, 'login']);

// put all api protected routes here
Route::middleware('auth:agentapi')->group(function () {
    Route::post('agent-detail', [AgentController::class, 'userDetail']);
    Route::post('agent/logout', [AgentController::class, 'logout']);
});