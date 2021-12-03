<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
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

Route::post('customer/login',[CustomerController::class, 'userLogin'])->name('userLogin');
Route::post('customer/register',[CustomerController::class, 'userRegister'])->name('userRegister');

// Route::group( ['prefix' => 'customer','middleware' => ['auth:user-api','scopes:user'] ],function(){
//    // authenticated staff routes here 
//     Route::get('dashboard',[LoginController::class, 'userDashboard']);
//     Route::post('logout',[LoginController::class, 'userLogout']);
    
// });   