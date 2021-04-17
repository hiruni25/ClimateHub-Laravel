<?php
use App\Http\Controllers\EventController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

Route::group([

    'middleware' => 'api'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('registeruser', 'AuthController@register');
    Route::post('sendPasswordLink', 'ChangePasswordController@sendEmail');
    Route::post('resetPassword', 'ResetPasswordController@process');

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

    //Route::post('savePoll', 'EventController@createPoll');

    //get all events that have created poll from event table
    Route::get('getPollEvents','EventController@getPollEvents');

    //create post
    //Route::post("postCreatePost",'BlogPostController@post');
    Route::post("postCreatePost",[PostController::class,'post']);

    //delete post
    //Route::delete("delete",'BlogPostController@delete');
    Route::delete("delete",[PostController::class,'delete']);

    //to write a comment on post
    //Route::post("writeComment",'CommentController@send');
    Route::post("writeComment",[CommentController::class,'send']);

    //delete comment
    //Route::delete("delete",'CommentController@delete');
    Route::delete("delete",[CommentController::class,'delete']);

