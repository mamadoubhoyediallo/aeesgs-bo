<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryEvenementController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\OrganisateurController;
use App\Http\Controllers\ContactController;

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
    //Route::post('refresh', [AuthController::class, 'refresh']);
    //Route::get('user', [AuthController::class, 'user']);
    //Route::post('logout', [AuthController::class, 'logout']);
    //Route::get('findAll', [AuthController::class, 'findAll']);
    //Route::get('destroy/{id}', [AuthController::class, 'destroy']);
//    Route::post('addCategoryEvent', [CategoryEvenementController::class, 'add']);
//    Route::get('findAllCategoryEvent', [CategoryEvenementController::class, 'findAllCategoryEvent']);
    Route::post('addEvent', [EvenementController::class, 'add']);
    Route::get('findAllEvent', [EvenementController::class, 'index']);
//    Route::post('addOrga', [OrganisateurController::class, 'add']);
//    Route::get('findAllOrga', [OrganisateurController::class, 'findAllOrga']);
//    Route::put('updateOrga/{id}', [OrganisateurController::class, 'update']);
//    Route::delete('deleteOrga/{id}', [OrganisateurController::class, 'destroy']);

Route::group(['prefix'=>'users'], function(){
    Route::get('show', [AuthController::class, 'user']);
    Route::get('findAll', [AuthController::class, 'findAll']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::get('destroy/{id}', [AuthController::class, 'destroy']);
});
Route::group(['prefix'=>'organisateurs'], function(){
    Route::post('add', [OrganisateurController::class, 'add']);
    Route::get('findAll', [OrganisateurController::class, 'findAll']);
    Route::put('update/{id}', [OrganisateurController::class, 'update']);
    Route::delete('delete/{id}', [OrganisateurController::class, 'destroy']);
    Route::get('show/{id}', [OrganisateurController::class, 'show']);
});
Route::group(['prefix'=>'category-evenements'], function(){
    Route::post('add', [CategoryEvenementController::class, 'add']);
    Route::get('findAll', [CategoryEvenementController::class, 'findAll']);
    Route::get('show/{id}', [CategoryEvenementController::class, 'show']);
    Route::put('update/{id}', [CategoryEvenementController::class, 'update']);
    Route::delete('delete/{id}', [CategoryEvenementController::class, 'destroy']);
});
Route::group(['prefix'=>'contacts'], function(){
    Route::post('sendEmail', [ContactController::class, 'send_mail']);
    Route::get('findAll', [ContactController::class, 'findAll']);
});
