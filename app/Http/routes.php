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

//Route::get('/', 'WelcomeController@index');

// Autenticación

Route::get('auth/login', 'Auth\AuthController@getLogin');

Route::post('auth/login', 'Auth\AuthController@postLogin');

Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::controllers([
	//'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['middleware' => 'auth'], function() {
    
// Modulo de orden
    
Route::get('/', [
    'as' => 'ordenes.ultimas',
    'uses' => 'OrdenController@ultimas',
                ]);

Route::get('/ordenes_proceso', [
    'as' => 'ordenes.enProceso',
    'uses' => 'OrdenController@enProceso',
                ]);

Route::get('/orden_detalle/{id}', [
    'as' => 'ordenes.detalle',
    'uses' => 'OrdenController@detalle',
                ]);

Route::get('/entrega/{id}', [
    'as' => 'ordenes.detalleEntrega',
    'uses' => 'OrdenController@detalleEntrega',
                ]);

Route::get('/nueva_orden', [
    'as' => 'ordenes.create',
    'uses' => 'OrdenController@create',
                ]);

Route::post('/nueva_orden', [
    'as' => 'ordenes.store',
    'uses' => 'OrdenController@store',
                ]);
    
Route::get('/orden/{id}', [
    'as' => 'ordenes.edit',
    'uses' => 'OrdenController@edit',
                ]);
    
Route::post('/orden/{id}', [
    'as' => 'ordenes.update',
    'uses' => 'OrdenController@update',
                ]);
    
Route::get('/nueva_entrega/{id}', [
    'as' => 'entregas.create',
    'uses' => 'EntregaController@create',
                ]); 
    
Route::patch('/nueva_entrega/{id}', [
    'as' => 'entregas.store',
    'uses' => 'EntregaController@store',
                ]);        
    
Route::get('/exportar_ordenes', [
    'as' => 'ordenes.exportar',
    'uses' => 'OrdenController@exportar',
                ]);   
    
// Modulo de cliente

Route::resource('cliente', 'ClienteController');
    
Route::get('/exportar_clientes', [
    'as' => 'clientes.exportar',
    'uses' => 'ClienteController@exportar',
                ]);    

Route::get('/importar_clientes', [
    'as' => 'clientes.importar',
    'uses' => 'ClienteController@importar',
                ]);  

// Modulo de usuario

Route::resource('user', 'UserController');
    
Route::post('/nuevo_usuario', [
    'as' => 'users.registrar',
    'uses' => 'UserController@postRegister',
                ]);
    
Route::get('/probando', 'HomeController@index');    
    
});


