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
    Route::get('/license-holder','MemberController@getLastLicenseHolder');
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

Route::group(['prefix' => 'save-talk'], function () {
    Route::post('','SavedTalkController@store');
    Route::get('/saved-talks/{user_id}','SavedTalkController@show');
    Route::get('/delete/{talk_id}/{user_id}','SavedTalkController@destroy');
    Route::get('/is_saved/{talk_id}/{user_id}', 'SavedTalkController@isSaved');
});

Route::group(['prefix' => 'email'], function () {
    Route::post('','ArticlesEmailController@store');
    Route::delete('/{email}', 'ArticlesEmailController@destroy');
    Route::get('/check/{email}', 'ArticlesEmailController@emailExists');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
