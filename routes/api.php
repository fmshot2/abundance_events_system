<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AboutController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TestimonyController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SpeakerController;




use App\Http\Controllers\AuthController;


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

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'authenticate']);

Route::get('about', [AboutController::class, 'index']);
Route::get('about/{id}', [AboutController::class, 'show']);
Route::post('about', [AboutController::class, 'store']);
Route::put('about/{id}', [AboutController::class, 'update']);
Route::delete('about/{id}', [AboutController::class, 'delete']);

Route::get('event', [EventController::class, 'index']);

Route::get('event/{id}', [EventController::class, 'show']);
Route::get('upcomingevents', [EventController::class, 'showUpcomingEvent']);
Route::get('previousevents', [EventController::class, 'showPreviousEvent']);
Route::post('event', [EventController::class, 'store']);
Route::put('event/{id}', [EventController::class, 'update']);
Route::delete('event/{id}', [EventController::class, 'delete']);

//item routes
Route::get('item', [ItemController::class, 'index']);
Route::get('item/{id}', [ItemController::class, 'show']);
Route::post('event/{event_id}/item', [ItemController::class, 'store']);
Route::put('item/{id}', [ItemController::class, 'update']);
Route::delete('item/{id}', [ItemController::class, 'delete']);
Route::get('event/{event_id}/items', [ItemController::class, 'get_items_for_event']);

//item routes
Route::get('speaker', [SpeakerController::class, 'index']);
Route::get('speaker/{id}', [SpeakerController::class, 'show']);
Route::post('speaker', [SpeakerController::class, 'store']);
// Route::post('item/{item_id}/speaker', [SpeakerController::class, 'store']);
Route::put('speaker/{id}', [SpeakerController::class, 'update']);
Route::delete('speaker/{id}', [SpeakerController::class, 'delete']);
Route::get('item/{item_id}/speakers', [SpeakerController::class, 'get_speaker_for_item']);


Route::get('testimony', [TestimonyController::class, 'index']);
Route::get('testimony/{id}', [TestimonyController::class, 'show']);
Route::post('testimony', [TestimonyController::class, 'store']);
Route::put('testimony/{id}', [TestimonyController::class, 'update']);
Route::delete('testimony/{id}', [TestimonyController::class, 'delete']);

//services routes
Route::get('service', [ServiceController::class, 'index']);
Route::get('service/{id}', [ServiceController::class, 'show']);
Route::post('service', [ServiceController::class, 'store']);
Route::put('service/{id}', [ServiceController::class, 'update']);
Route::delete('service/{id}', [ServiceController::class, 'delete']);

// system_config routes
Route::get('system_config', [DetailController::class, 'index']);
Route::post('system_config', [DetailController::class, 'store']);
Route::put('system_config/{id}', [DetailController::class, 'update']);


//statistic routes
Route::get('statistic', [StatisticController::class, 'index']);
Route::get('statistic/{id}', [StatisticController::class, 'show']);
Route::post('statistic', [StatisticController::class, 'store']);
Route::put('statistic/{id}', [StatisticController::class, 'update']);
Route::delete('statistic/{id}', [StatisticController::class, 'delete']);


//statistic routes
Route::get('user', [UserController::class, 'index']);
Route::get('user/{id}', [UserController::class, 'show']);
Route::post('user', [UserController::class, 'store']);
Route::put('user/{id}', [UserController::class, 'update']);
Route::delete('user/{id}', [UserController::class, 'delete']);



Route::get('tutorial', [TutorialController::class, 'index']);
Route::get('tutorial/{id}', [TutorialController::class, 'show']);
Route::post('tutorial', [TutorialController::class, 'store']);
Route::put('tutorial/{id}', [TutorialController::class, 'update']);
Route::delete('tutorial/{id}', [TutorialController::class, 'delete']);



Route::group(['middleware' => ['jwt.verify']], function() {

    // Route::get('user', 'UserController@getAuthenticatedUser');
    // Route::get('closed', 'DataController@closed');
});
