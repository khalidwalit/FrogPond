<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FrogsController;
use App\Http\Controllers\PondsController;



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


Route::get('/frogs', 'FrogsController@getAllFrogs');
Route::get('/frogs',[FrogsController::class, 'getAllFrogs']);

Route::get('/frogs/{id}', 'FrogsController@getFrog');
Route::get('/frogs/{id}',[FrogsController::class, 'getFrog']);

Route::post('/frogs', 'FrogsController@createFrogs');
Route::post('/frogs',[FrogsController::class, 'createFrog']);

Route::put('/frogs/{id}', 'FrogsController@updateFrog');
Route::put('/frogs/{id}',[FrogsController::class, 'updateFrog']);


Route::delete('/frogs/{id}', 'FrogsController@deleteFrog');
Route::delete('/frogs/{id}',[FrogsController::class, 'deleteFrog']);


//---------

Route::get('/ponds', 'PondsController@getAllPonds');
Route::get('/ponds',[PondsController::class, 'getAllPonds']);

Route::get('/ponds/{id}', 'PondsController@getPond');
Route::get('/ponds/{id}',[PondsController::class, 'getPond']);

Route::post('/ponds', 'PondsController@createPond');
Route::post('/ponds',[PondsController::class, 'createPond']);

Route::put('/ponds/{id}', 'PondsController@updatePond');
Route::put('/ponds/{id}',[PondsController::class, 'updatePond']);


Route::delete('/ponds/{id}', 'PondsController@deletePond');
Route::delete('/ponds/{id}',[PondsController::class, 'deletePond']);




