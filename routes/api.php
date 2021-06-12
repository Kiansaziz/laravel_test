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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['as' => 'user.', 'prefix' => '/user'], function () {
  Route::get('/', [App\Http\Controllers\Api\UserController::class, 'index'])->name('index');
  Route::post('/', [App\Http\Controllers\Api\UserController::class, 'store'])->name('store');
  Route::get('/{id}', [App\Http\Controllers\Api\UserController::class, 'find'])->name('find');
  Route::put('/{id}', [App\Http\Controllers\Api\UserController::class, 'update'])->name('update');
  Route::delete('/{id}', [App\Http\Controllers\Api\UserController::class, 'delete'])->name('delete');
});

Route::group(['as' => 'social_media.', 'prefix' => '/social_media'], function () {
  Route::get('/google', [App\Http\Controllers\Api\SocialController::class, 'google'])->name('google');
  Route::get('/facebook', [App\Http\Controllers\Api\SocialController::class, 'facebook'])->name('facebook');
});
