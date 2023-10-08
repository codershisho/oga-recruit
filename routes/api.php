<?php

use App\Http\Controllers\Api\DiscussionApi;
use App\Http\Controllers\Api\EntryApi;
use App\Http\Controllers\Api\MasterApi;
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
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;

Route::post('/login', LoginController::class)->name('login');
Route::post('/logout', LogoutController::class)->name('logout');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('/ogarec/v1')->group(function () {
    Route::prefix('/masters')->group(function () {
        Route::get('/', [MasterApi::class, 'index']);
    });

    Route::prefix('/entries')->group(function () {
        Route::get('/', [EntryApi::class, 'index']);

        Route::prefix('/{id}')->group(function () {
            Route::get('/', [EntryApi::class, 'show']);
            Route::get('/discussion', [DiscussionApi::class, 'search']);
            Route::post('/discussion', [DiscussionApi::class, 'store']);
        });
    });
});
