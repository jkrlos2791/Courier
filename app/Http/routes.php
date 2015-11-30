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

Route::get('/', 'WelcomeController@index');

// Autenticación

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['middleware' => 'auth'], function() {
    
// Modulo de orden
    
Route::get('/ordenes', [
    'as' => 'ordenes.ultimas',
    'uses' => 'OrdenController@ultimas',
                ]);

Route::get('/orden/{id}', [
    'as' => 'ordenes.detalle',
    'uses' => 'OrdenController@detalle',
                ]);

Route::get('/entrega/{id}', [
    'as' => 'ordenes.detalleEntrega',
    'uses' => 'OrdenController@detalleEntrega',
                ]);

// Crear orden

Route::get('/nueva_orden', [
    'as' => 'ordenes.create',
    'uses' => 'OrdenController@create',
                ]);

Route::post('/nueva_orden', [
    'as' => 'ordenes.store',
    'uses' => 'OrdenController@store',
                ]);
    
// Mantenimientos

Route::resource('cliente', 'ClienteController');
    
});


