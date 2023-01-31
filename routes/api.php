<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespaces' => 'User','prefix' => 'users'],function () {
    Route::post('/',[\App\Http\Controllers\User\StoreController::class,'store']);
});


Route::group(['namespaces' => 'Fruit','prefix' => 'fruits'],function () {
    Route::get('/',[\App\Http\Controllers\Fruit\IndexController::class,'fruit']);
});

