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
/*
Route::get('/', function()
{
	return View::make('hello');
});*/
Route::get('logout',array('as'=>'logout','uses'=>'App\Controllers\AuthController@getLogout'));
Route::get('login',array('as'=>'login','uses'=> 'App\Controllers\AuthController@getLogin'));
Route::post('login', array('as' => 'login.post', 'uses' => 'App\Controllers\AuthController@postLogin'));


//playground
Route::get('/playground/inter',array('as'=>'playground.inter','uses'=>'App\Controllers\PlayGroundController@inter'));
Route::get('/playground/prolist',array('as'=>'playground.prolist','uses'=>'App\Controllers\PlayGroundController@prolist'));
Route::get('/playground/submit/{id}',array('as'=>'playground.submit','uses'=>'App\Controllers\PlayGroundController@submit'));

Route::get('/home','HomeController@index');
Route::get('sign_up',array('as'=>'sign_up','uses'=>'App\Controllers\AuthController@signup'));

Route::get('statistic',array('as'=>'statistic','uses'=>'App\Controllers\UsersController@statistic'));
Route::get('submit/action/{id}',array('as'=>'submit.action','uses'=>'App\Controllers\SubmitController@action'));




Route::group(array('prefix'=>''),function()
{
    Route::any('/','App\Controllers\HomeController@index');
    Route::resource('users','App\Controllers\UsersController');
    Route::resource('problems','App\Controllers\ProblemsController');
    Route::resource('home','App\Controllers\HomeController');
    Route::resource('submit','App\Controllers\SubmitController');
    Route::resource('playground', 'App\Controllers\PlayGroundController');
});

Route::group(array('prefix'=>'problems','before'=>'auth.admin'),function()
{
    Route::resource('users','App\Controllers\UsersController');
    Route::resource('problems','App\Controllers\ProblemsController');
    Route::resource('home','App\Controllers\HomeController');
	Route::resource('submit','App\Controllers\SubmitController');
    Route::resource('playground', 'App\Controllers\PlayGroundController');
});

Route::group(array('prefix'=>'admin','before'=>'auth.admin'),function()
{
    Route::any('/','App\Controllers\HomeController@index');
    Route::resource('users','App\Controllers\UsersController');

    Route::resource('problems','App\Controllers\ProblemsController');
    Route::resource('home','App\Controllers\HomeController');
    Route::resource('submit','App\Controllers\SubmitController');
    Route::resource('playground', 'App\Controllers\PlayGroundController');
});

