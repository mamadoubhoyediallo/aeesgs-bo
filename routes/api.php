<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryEvenementController;
use App\Http\Controllers\EvenementController;

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

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('refresh', [AuthController::class, 'refresh']);
Route::get('user', [AuthController::class, 'user']);
Route::post('logout', [AuthController::class, 'logout']);
Route::get('findAll', [AuthController::class, 'findAll']);
Route::get('destroy/{id}', [AuthController::class, 'destroy']);
Route::post('addCategoryEvent', [CategoryEvenementController::class, 'add']);
Route::get('findAllCategoryEvent', [CategoryEvenementController::class, 'findAllCategoryEvent']);
Route::post('addEvent', [EvenementController::class, 'add']);
Route::get('findAllEvent', [EvenementController::class, 'index']);

