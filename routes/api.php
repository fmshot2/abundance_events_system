<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServiceController;




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

Route::get('about', [AboutController::class, 'index']);
Route::get('about/{id}', [AboutController::class, 'show']);
Route::post('about', [AboutController::class, 'store']);
Route::put('about/{id}', [AboutController::class, 'update']);
Route::delete('about/{id}', [AboutController::class, 'delete']);

Route::get('services', [ServiceController::class, 'index']);
Route::get('service/{id}', [ServiceController::class, 'show']);
Route::post('service', [ServiceController::class, 'store']);
Route::put('service/{id}', [ServiceController::class, 'update']);
Route::delete('services/{id}', [ServiceController::class, 'delete']);

