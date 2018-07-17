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
          Route::get('games/game1', 'GamesController@numbers')->name('game.numbers');
          Route::get('games/game2', 'GamesController@tetoris')->name('game.tetoris');
          Route::get('games/game1/defence', 'GamesController@defence')->name('game.defence');
          Route::get('games/game/result', 'GamesController@result')->name('game.result');
          Route::get('games/game/result/offence', 'GamesController@result_after')->name('game.result_after');
          Route::get('seats/update', 'SeatsController@update')->name('seat.update');
          
          Route::get('games/wait', 'GamesController@wait')->name('game.wait');
          Route::get('games/confirm', 'GamesController@confirm')->name('game.confirm');
          
          Route::get('offence', 'OffencesController@select')->name('offence.select');
          Route::get('offence2', 'OffencesController@select2')->name('offence.select2');
          Route::get('offence3', 'OffencesController@select3')->name('offence.select3');
          Route::get('offence4', 'OffencesController@select4')->name('offence.select4');
          Route::get('offence5', 'OffencesController@select5')->name('offence.select5');
          Route::get('offence6', 'OffencesController@select6')->name('offence.select6');
          Route::get('offence7', 'OffencesController@select7')->name('offence.select7');
          Route::get('offence8', 'OffencesController@select8')->name('offence.select8');
          Route::get('offence9', 'OffencesController@select9')->name('offence.select9');
          Route::get('offence10', 'OffencesController@select10')->name('offence.select10');
          Route::get('offence11', 'OffencesController@select11')->name('offence.select11');
          Route::get('offence12', 'OffencesController@select12')->name('offence.select12');
          Route::get('offence13', 'OffencesController@select13')->name('offence.select13');
          Route::get('offence14', 'OffencesController@select14')->name('offence.select14');
          Route::get('offence15', 'OffencesController@select15')->name('offence.select15');
          Route::get('offence16', 'OffencesController@select16')->name('offence.select16');
          Route::get('offence17', 'OffencesController@select17')->name('offence.select17');
          Route::get('offence18', 'OffencesController@select18')->name('offence.select18');
          Route::get('offence19', 'OffencesController@select19')->name('offence.select19');
          Route::get('offence20', 'OffencesController@select20')->name('offence.select20');
          Route::get('offence21', 'OffencesController@select21')->name('offence.select21');
          Route::get('offence22', 'OffencesController@select22')->name('offence.select22');
          Route::get('offence23', 'OffencesController@select23')->name('offence.select23');
          Route::get('offence24', 'OffencesController@select24')->name('offence.select24');
          Route::get('offence25', 'OffencesController@select25')->name('offence.select25');
          Route::get('offence26', 'OffencesController@select26')->name('offence.select26');
          Route::get('offence27', 'OffencesController@select27')->name('offence.select27');
          Route::get('offence28', 'OffencesController@select28')->name('offence.select28');
          Route::get('offence29', 'OffencesController@select29')->name('offence.select29');
          Route::get('offence30', 'OffencesController@select30')->name('offence.select30');
          Route::get('offence31', 'OffencesController@select31')->name('offence.select31');
          Route::get('offence32', 'OffencesController@select32')->name('offence.select32');
          Route::get('offence33', 'OffencesController@select33')->name('offence.select33');
          Route::get('offence34', 'OffencesController@select34')->name('offence.select34');
          Route::get('offence35', 'OffencesController@select35')->name('offence.select35');
          Route::get('offence36', 'OffencesController@select36')->name('offence.select36');
          Route::get('offence37', 'OffencesController@select37')->name('offence.select37');
          Route::get('offence38', 'OffencesController@select38')->name('offence.select38');
          Route::get('offence39', 'OffencesController@select39')->name('offence.select39');
          Route::get('offence40', 'OffencesController@select40')->name('offence.select40');
          Route::get('offence41', 'OffencesController@select41')->name('offence.select41');
          Route::get('offence42', 'OffencesController@select42')->name('offence.select42');
          Route::get('offence43', 'OffencesController@select43')->name('offence.select43');
          Route::get('offence44', 'OffencesController@select44')->name('offence.select44');
          Route::get('offence45', 'OffencesController@select45')->name('offence.select45');
       });
});




Route::post('add_info', 'UsersController@add')->name('add.info');
