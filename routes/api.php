<?php

use App\Http\Controllers\AuthController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');

    Route::group(['middleware' => 'jwt.auth'], function (){
        Route::group(['namespaces' => 'Fruit','prefix' => 'fruits'],function () {
            Route::get('/',[\App\Http\Controllers\Fruit\IndexController::class,'fruit']);
        });
    });


});

Route::group(['namespaces' => 'User','prefix' => 'users'],function () {
    Route::post('/',[\App\Http\Controllers\User\StoreController::class,'store']);
});



