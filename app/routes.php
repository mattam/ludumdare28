<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('as' => 'home', function()
{
	return View::make('home.index');
}));

//Temporarily disable Sentry Throttling for now
// Get the Throttle Provider
$throttleProvider = Sentry::getThrottleProvider();
// Disable the Throttling Feature
$throttleProvider->disable();

//Authentication routes

Route::get('auth/logout',  array('as' => 'auth.logout',      'uses' => 'App\Controllers\Auth\AuthController@getLogout'));
Route::get('auth/login',   array('as' => 'auth.login',       'uses' => 'App\Controllers\Auth\AuthController@getLogin'));
Route::post('auth/login',  array('as' => 'auth.login.post',  'uses' => 'App\Controllers\Auth\AuthController@postLogin'));
Route::get('auth/register',  array('as' => 'auth.register',  'uses' => 'App\Controllers\Auth\AuthController@getRegister'));
Route::post('auth/register',  array('as' => 'auth.register.post',  'uses' => 'App\Controllers\Auth\AuthController@postRegister'));

Route::group(array('before' => 'sentry'), function()
{

Route::resource('dices', 'DicesController');
Route::get('dices/{id}/roll', 'DicesController@roll');	
Route::get('game', array('as'=>'game', 'uses'=>'DicesController@getDices'));
Route::get('addDice', 'DicesController@addDice');
});


/*
|--------------------------------------------------------------------------
| Filter
|--------------------------------------------------------------------------
*/
Route::filter('sentry', function()
{
	if (!Sentry::check()) return Redirect::to('auth/login');
});