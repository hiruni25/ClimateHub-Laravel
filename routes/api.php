<?php
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProjectController;
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
    

});

    Route::post('sendPasswordLink', 'ChangePasswordController@sendEmail');
    Route::post('resetPassword', 'ResetPasswordController@process');

});


    //get project by using id
    Route::get('getProjectById/{id}', 'ProjectController@getProjectById');

    //project list
    Route::get('projects', 'ProjectController@getAllProjects');

    //upload project details
    //Route::post('uploadProject', 'ProjectController@uploadProject');
    Route::post("uploadProject",[ProjectController::class,'uploadProject']);

    //update project by using id
    Route::put('updateProject/{id}', 'ProjectController@updateProject');

    //delete project
    Route::delete('deleteProject/{id}', 'ProjectController@deleteProject');


    Route::resource('projects', 'ProjectController');
    
/**************************************Event Controller functions************************************************ */

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

    //save vote to the EventUser table
    Route:: post('saveVote','EventController@saveVote');

    //get vote result
    Route::get('voteResult/{event_id}', 'EventController@getVoteResult');
    
    /************************************************************************************** */

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

    // Get all users
    Route::get('users', 'EditDataController@getUsers');

    //Get specific users
    Route::get('users/{id}', 'EditDataController@getUsersById');

    //Update Users
    Route::put('updateUsers/{id}', 'EditDataController@updateUsers');

    //Delete Users
    Route::delete('deleteUsers/{id}', 'EditDataController@deleteUsers');



     // Get all users
     Route::get('getusers', 'EditDataController@displayUsers');

     //Get specific users
     Route::get('getusers/{id}', 'EditDataController@displayUsersById');

     //Delete Users
    Route::delete('clearUsers/{id}', 'EditDataController@clearUsers');

    //add data
    Route::post('addData','EditDataController@addUsers');

    




