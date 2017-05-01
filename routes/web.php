<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now redirect something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});


Auth::routes();

Route::middleware('auth')->group(function () {
    Route::name('accounts.add')->post('accounts', 'AccountController@redirect');
    Route::get('accounts/callback', 'AccountController@callback');

    Route::name('timeline')->get('timeline', 'TimelineController@index');
    Route::name('timeline.account')->get('timeline/{username}@{domain}', 'TimelineController@acct');

    Route::get('home', 'HomeController@index');
});

Route::middleware('auth')->namespace('Api')->prefix('api')->group(function () {
    Route::delete('status/hide/{status}', 'StatusController@hide');
    Route::put('status/show/{status}', 'StatusController@show');

    Route::get('accounts', 'AccountController@index');
});


Route::namespace('Open')->group(function () {
    Route::name('open.user')->get('@{user}', 'UserController@index');
    Route::name('open.account.index')->get('@{user}/{username}@{domain}', 'AccountController@index');
    Route::name('open.account.show')->get('@{user}/{username}@{domain}/{status_id}', 'AccountController@show');

    Route::name('open.user.date')->get('@{user}/date/{date}', 'DateController@show')
         ->where('date', '[0-9]{4}-[0-9]{2}-[0-9]{2}');

});

Route::namespace('Api')->prefix('api')->group(function () {
    Route::get('calendar/{user}', 'CalendarController@index');
    Route::get('calendar/{user}/{username}@{domain}', 'CalendarController@acct');
});


Route::get('sitemaps', 'SitemapController');


Route::get('/', 'WelcomeController');
