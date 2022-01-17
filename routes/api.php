<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AboutController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TestimonyController;






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


Route::get('event', [EventController::class, 'index']);
// Route::get('about/{id}', [AboutController::class, 'show']);
// Route::post('about', [AboutController::class, 'store']);
// Route::put('about/{id}', [AboutController::class, 'update']);
// Route::delete('about/{id}', [AboutController::class, 'delete']);

Route::get('testimony', [TestimonyController::class, 'index']);
// Route::get('about/{id}', [AboutController::class, 'show']);
// Route::post('about', [AboutController::class, 'store']);
// Route::put('about/{id}', [AboutController::class, 'update']);
// Route::delete('about/{id}', [AboutController::class, 'delete']);

Route::get('service')

Service
 upcoming events
Previous  events
Configuration
API's to send
[12:11 PM, 1/17/2022] Md: Statistics
