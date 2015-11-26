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

Route::get('/', [
    'as' => 'ordenes.ultimas',
    'uses' => 'OrdenController@ultimas',
                ]);

Route::get('/orden/{id}', [
    'as' => 'ordenes.detalle',
    'uses' => 'OrdenController@detalle',
                ]);

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::resource('user', 'UserController');