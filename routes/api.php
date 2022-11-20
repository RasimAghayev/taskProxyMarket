<?php

use App\Http\Controllers\API\ApiUserController;
use App\Http\Controllers\API\ProxyController;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('login', [ApiUserController::class, 'authenticate']);
Route::post('register', [ApiUserController::class, 'register']);

Route::group(['middleware' => ['jwt.verify'],'prefix'=>'v1','namespace'=>'App\Http\Controllers\API'], function() {
    Route::get('logout', [ApiUserController::class, 'logout']);
    Route::get('getUser', [ApiUserController::class, 'getUser']);
    Route::apiResource('proxies',ProxyController::class);
    Route::post('proxies/list', [ProxyController::class, 'list']);
    Route::post('proxies/export', [ProxyController::class, 'export']);
});
