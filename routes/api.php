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
use App\Http\Controllers\PostController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\AuthController;
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('register', [AuthController::class, 'register']);
Route::apiResource('website', WebsiteController::class);
Route::resource('website.posts', PostController::class, ['only' => [
    'index', 'show', 'store', 'update', 'destroy'
]]);
Route::resource('website.subscribers', SubscribeController::class, ['only' => [
    'index', 'store', 'destroy'
]]);
