<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Controller;
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

Route::get('/', [Controller::class, 'routes'])->name('route information');
Route::get('/error', [Controller::class, 'error'])->name('error route');

Route::group([
    'middleware' => ['auth:sanctum'],
    'prefix' => 'api/auth',
], function ($router) {
    Route::post('login', [AuthController::class, 'login'])->withoutMiddleware(['auth:sanctum'])->name('login');
    Route::post('register', [AuthController::class, 'register'])->withoutMiddleware(['auth:sanctum']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::get('user', [AuthController::class, 'me']);
});

Route::group([
    'middleware' => ['auth:sanctum'],
    'prefix' => 'api',
], function ($router) {
    // Define Additional Routes
    Route::get('/example', [Controller::class, 'example'])->name('example route');
});