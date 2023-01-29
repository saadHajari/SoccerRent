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
/*
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::get('/','AuthController@index')->name('login')->middleware('guest');

//Authenticate a user
Route::post('/','AuthController@authenticate')->name('auth.authenticate');


Route::get('/', function () {
	if(Auth::admins()->isadming == 0)
    return view('villes');
});

Route::get('/home','DashboardController@index')->name('dashboard');

*/




Route::get('/','AuthController@index')->name('login')->middleware('guest');


Route::post('/','AuthController@authenticate')->name('auth.authenticate');


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/chart', 'ChartController@index');
//Route::resource('/terrains','TerrainController');
//Route::post('/terrains/create','TerrainController@store')->name('terrain.store');

Route::resource('terrain','TerrainController');
Route::post('terrain/search','TerrainController@search')->name('terrains.search');


Route::resource('reservation','ReservationController');
Route::post('reservation/search','ReservationController@search')->name('reservations.search');


Route::resource('club','ClubController');

Route::resource('adherant','AdherantController');
Route::post('adherant/search','AdherantController@search')->name('adherant.search');


Route::get('/dashboard','DashboardController@index')->name('dashboard');



Route::get('/logout','AuthController@logout')->name('auth.logout')->middleware('auth');

Route::get('/admin','AuthController@show')->name('auth.show')->middleware('auth');

Route::get('/password/reset','ResetPassword\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/password/email','ResetPassword\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/password/reset/{token}','ResetPassword\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/password/reset','ResetPassword\ResetPasswordController@reset');

Route::resource('/villes','VilleController');
Route::post('/villes/search','VilleController@search')->name('villes.search');

Route::resource('/typeterrains','typeterrainController');
Route::post('/typeterrains/search','typeterrainController@search')->name('typeterrains.search');


Route::resource('/admins','AdminsController');
Route::post('/admins','AdminsController@search')->name('admins.search');
Route::post('/admins/create','AdminsController@store')->name('admins.store');

Route::resource('/delegates','DelegateController');
Route::post('/delegates/search','DelegateController@search')->name('delegates.search');


Route::resource('/clubs','clubController');
Route::post('clubs/search','clubController@search')->name('clubs.search');


Route::get('/contacts', 'ContactsController@get');
Route::get('/conversation/{id}', 'ContactsController@getMessagesFor');
Route::post('/conversation/send', 'ContactsController@send');

