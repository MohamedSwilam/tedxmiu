<?php

use Illuminate\Http\Request;

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

Route::group(['prefix' => 'events'], function () {
    Route::get('', 'eventsController@index');
    Route::get('/{eventID}', 'eventsController@getOnly');
});

Route::group(['prefix' => 'years'], function () {
    Route::get('', 'YearController@index');
    Route::get('/{yearID}', 'MemberController@getBoard');
    Route::get('/{yearID}/{HeadID}', 'MemberController@getTeam');
});

Route::group(['prefix' => 'speaker'], function () {
    Route::get('/{speaker_id}', 'TalkController@getOnly');
});

Route::group(['prefix' => 'sponsors'], function () {
    Route::get('', 'YearController@getSponsors');
});

Route::group(['prefix' => 'home'], function () {
    Route::get('/speakers', 'TalkController@getRandom');
    Route::get('/events/{counter}', 'eventsController@getLast');
    Route::get('/lastboard', 'MemberController@getLastBoard');
});





Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
