<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'PagesController@home');

// User
Route::get('/users/register', 'Auth\AuthController@getRegister');
Route::post('/users/register', 'Auth\AuthController@postRegister');
Route::get('users/logout', 'Auth\AuthController@logout');
Route::get('users/login', 'Auth\AuthController@getLogin');
Route::post('users/login', 'Auth\AuthController@postLogin');

Route::group(array('prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'), function () {
  Route::get('users', 'UsersController@index');
});

//Timelogs
Route::get('/workers', 'WorkersController@index');
Route::get('/workers/create', 'WorkersController@create');
Route::post('/workers/create', 'WorkersController@store');

Route::get('/teams', 'TeamsController@index');
Route::get('/teams/create', 'TeamsController@create');
Route::post('/teams/create', 'TeamsController@store');

Route::get('/timelogs', 'TimelogsController@index');
Route::post('/timelogs', 'TimelogsController@search');
Route::get('/timelogs/today', 'TimelogsController@indextoday');
Route::post('/timelogs/today', 'TimelogsController@search');
Route::get('/timelogs/create', 'TimelogsController@create');
Route::get('/timelogs/{id?}/edit', 'TimelogsController@edit');
Route::post('/timelogs/{id?}/edit', 'TimelogsController@update');
Route::get('/timelogs/{id?}/delete','TimelogsController@destroy');
Route::get('/timelogs/{team?}/create_equip', 'TimelogsController@create_equip');
Route::get('/timelogs/logging', 'TimelogsController@logging');
Route::post('/timelogs/{team?}/create_equip', 'TimelogsController@store');

Route::post('/timelogs/logging', 'TimelogsController@storelogging');


// RoturesPaper
Route::get('/rotures', 'RoturesPaperController@index');
Route::get('/rotures/create', 'RoturesPaperController@create');
Route::post('/rotures/create', 'RoturesPaperController@store');


// RoturesPaper
Route::get('/controlph', 'ControlPhController@index');
Route::get('/controlph/nevera3', 'ControlPhController@nevera3');
Route::get('/controlph/create', 'ControlPhController@create');
Route::post('/controlph/create', 'ControlPhController@store');


// Customers
Route::get('/customers', 'CustomersController@index');
/**
Route::get('/customers/create', 'CustomersController@create');
Route::post('/customers/create', 'CustomersController@store');
Route::get('/customers/{slug?}', 'CustomersController@show');
Route::get('/customers/{slug?}/edit', 'CustomersController@edit');
Route::post('/customers/{slug?}/edit','CustomersController@update');
Route::get('/customers/{slug?}/delete','CustomersController@destroy');
**/

// Publications
Route::get('/publications', 'PublicationsController@index');
Route::get('/publications/create', 'PublicationsController@create');
Route::post('/publications/create', 'PublicationsController@store');
Route::get('/publications/{slug?}', 'PublicationsController@show');
Route::get('/publications/{slug?}/edit', 'PublicationsController@edit');
Route::post('/publications/{slug?}/edit','PublicationsController@update');
Route::post('/publications/{slug?}/delete','PublicationsController@destroy');

// TypePeople
Route::get('/typeperson', 'TypePersonController@index');
Route::get('/typeperson/create', 'TypePersonController@create');
Route::post('/typeperson/create', 'TypePersonController@store');
Route::get('/typeperson/{id?}/delete','TypePersonController@destroy');

// People
Route::get('/people', 'PeopleController@index');
Route::get('/people/create', 'PeopleController@create');
Route::post('/people/create', 'PeopleController@store');
Route::get('/people/{slug?}', 'PeopleController@show');
Route::get('/people/{slug?}/edit', 'PeopleController@edit');
Route::post('/people/{slug?}/edit','PeopleController@update');
Route::post('/people/{slug?}/delete','PeopleController@destroy');

// Inputs
Route::get('/inputs', 'InputsController@index');
Route::get('/inputs/create', 'InputsController@create');
Route::post('/inputs/create', 'InputsController@store');
Route::get('/inputs/{id?}/delete','InputsController@destroy');

// TechData
Route::get('/techdata', 'TechDataController@index');
Route::get('/techdata/create', 'TechDataController@create');
Route::post('/techdata/create', 'TechDataController@store');
Route::get('/techdata/{id?}', 'TechDataController@show');
Route::get('/techdata/{id?}/edit', 'TechDataController@edit');
Route::post('/techdata/{id?}/edit','TechDataController@update');
Route::post('/techdata/{id?}/delete','TechDataController@destroy');

// Filmacios
Route::get('/filmacios', 'FilmaciosController@index');
Route::get('/filmacios/create', 'FilmaciosController@create');
Route::post('/filmacios/create', 'FilmaciosController@store');
Route::get('/filmacios/{id?}/delete','FilmaciosController@destroy');
