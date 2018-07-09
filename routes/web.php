<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'WelcomeController@index');

// User registration
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// Login authentication
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');



Route::group(['middleware' => ['auth']], function () {
     Route::group(['prefix' => 'seats/{id}'], function () {
        Route::get('offence', 'SeatsController@show')->name('offence');
     });
});

Route::get('seats', 'SeatsController@index')->name('seat');

Route::group(['middleware' => ['auth']], function () {
     Route::resource('users', 'UsersController', ['only' => ['index', 'show', 'users']]);
     Route::group(['prefix' => 'users/{id}'], function () {
          Route::get('games', 'GamesController@index')->name('game.index');
          Route::get('games/game', 'GamesController@show')->name('game.show');
          Route::get('games/game/result', 'GamesController@result')->name('game.result');
          Route::get('seats/update', 'SeatsController@update')->name('seat.update');
          Route::resource('offence','OffencesController',['only' => ['index']]);
     });
});




Route::post('add_info', 'UsersController@add')->name('add.info');
