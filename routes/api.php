<?php
use App\Http\Controllers\EventController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

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

    //get all events from event table
    Route::get('events', 'EventController@getAllEvents');

    //get event from event table using event id
    Route::get('getEventById/{id}', 'EventController@getEventById');

    //save events t the event table
    Route::post('saveEvent', 'EventController@store');

    //update events
    Route::put('updateEvent/{id}', 'EventController@updateEvent');

    //delete events
    Route::delete('deleteEvent/{id}','EventController@deleteEvent');

    //Email Route
    Route::get('sendMail', [EventController::class, 'mail'])->name('email');

    //get usertype and then derive email
    Route::post('getUserEmail','EventController@getUserEmail');

    Route::post('savePoll', 'EventController@createPoll');

    //get all events that have created poll from event table
    Route::get('getPollEvents','EventController@getPollEvents');

