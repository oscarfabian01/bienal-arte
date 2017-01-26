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

Route::group(['middleware' => 'loggin'], function(){
	Route::get('/', ['uses' => 'InscripcionController@create', 'as' => 'inscripcion.create']);
});

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('registro', ['uses' => 'InscripcionController@create', 'as' => 'inscripcion.create']);
Route::put('actualizarestado', ['uses' => 'InscripcionController@actualizarEstado', 'as' => 'inscripcion.actualizarestado']);
Route::get('confirmacion/{id}', ['uses' => 'InscripcionController@confirmacion', 'as' => 'inscripcion.confirmacion']);
Route::get('payurespuesta', ['uses' => 'InscripcionController@payUresponse', 'as' => 'inscripcion.payuresponse']);
Route::post('payuconfirmacion', ['uses' => 'InscripcionController@payUconfirmation', 
	'as' => 'inscripcion.payuconfirmation']);
Route::post('inscripcionform', ['uses' => 'InscripcionController@store', 'as' => 'inscripcion.store']);
Route::post('sendemail', ['uses' => 'InscripcionController@sendEmail', 'as' => 'inscripcion.sendemail']);

Route::group(['middleware' => 'auth'],function(){
	Route::get('inscripciones', ['uses' => 'InscripcionController@index', 'as' => 'inscripcion.index']);
	Route::get('inscripcion/{id}', ['uses' => 'InscripcionController@show', 'as' => 'inscripcion.show']);
	Route::get('mensaje', ['uses' => 'InscripcionController@showEmail', 'as' => 'inscripcion.showemail']);
});

