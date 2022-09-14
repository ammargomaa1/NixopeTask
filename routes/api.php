<?php

use App\Http\Controllers\RoleController;
use App\Http\Controllers\RoleUserController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('user/{user}/roles', [RoleUserController::class,'add']);

Route::delete('user/{user}/roles', [RoleUserController::class, 'destroy']);

Route::resource('user', UserController::class);

Route::resource('role', RoleController::class);
