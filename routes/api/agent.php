<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgentController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('agent/login',[AgentController::class, 'agentLogin'])->name('agentLogin');
Route::post('agent/register',[AgentController::class, 'agentRegister'])->name('agentRegister');
// Route::group( ['prefix' => 'agent','middleware' => ['auth:agent-api','scopes:agent'] ],function(){
//    // authenticated staff routes here 
//     Route::get('dashboard',[LoginController::class, 'agentDashboard']);
// });