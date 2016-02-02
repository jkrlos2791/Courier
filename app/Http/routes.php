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

// Autenticación
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::controllers([
	'password' => 'Auth\PasswordController',
]);

Route::group(['middleware' => 'auth'], function() {

// Orden 
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
Route::patch('/orden/{id}', [
    'as' => 'ordenes.update',
    'uses' => 'OrdenController@update',
                ]);       
Route::delete('/orden/{orden}', [
    'as' => 'orden.destroy',
    'uses' => 'OrdenController@destroy',
                ]); 
Route::get('/exportar_ordenes', [
    'as' => 'ordenes.exportar',
    'uses' => 'OrdenController@exportar',
                ]); 
Route::get('/orden/{id}/generar', [
    'as' => 'orden.generar',
    'uses' => 'OrdenController@generarOrden',
                ]);    
Route::get('/orden/ver/despachado', [
    'as' => 'orden.despachado',
    'uses' => 'OrdenController@despachado',
                ]);     
Route::get('/orden/ver/en_proceso', [
    'as' => 'orden.enproceso',
    'uses' => 'OrdenController@enProceso',
                ]);     
    
// Entrega  
Route::get('/nueva_entrega/{id}', [
    'as' => 'entregas.create',
    'uses' => 'EntregaController@create',
                ]);     
Route::patch('/nueva_entrega/{id}', [
    'as' => 'entregas.store',
    'uses' => 'EntregaController@store',
                ]);   
Route::get('/entrega/{entrega}/edit', [
    'as' => 'entrega.edit',
    'uses' => 'EntregaController@edit',
                ]);     
Route::patch('/entrega/{entrega}', [
    'as' => 'entrega.update',
    'uses' => 'EntregaController@update',
                ]);     
Route::delete('/entrega/{entrega}', [
    'as' => 'entrega.destroy',
    'uses' => 'EntregaController@destroy',
                ]);
    
// Item    
Route::get('/item/{item}/create', [
    'as' => 'item.create',
    'uses' => 'ItemController@create',
                ]);     
Route::patch('/item/{item}/store', [
    'as' => 'item.store',
    'uses' => 'ItemController@store',
                ]);   
Route::get('/item/{item}/edit', [
    'as' => 'item.edit',
    'uses' => 'ItemController@edit',
                ]);     
Route::patch('/item/{item}/update', [
    'as' => 'item.update',
    'uses' => 'ItemController@update',
                ]);     
Route::delete('/item/{item}', [
    'as' => 'item.destroy',
    'uses' => 'ItemController@destroy',
                ]);    
    
// Cliente
Route::resource('cliente', 'ClienteController');  
Route::get('/exportar_clientes', [
    'as' => 'clientes.exportar',
    'uses' => 'ClienteController@exportar',
                ]);    
Route::get('/importar_clientes', [
    'as' => 'clientes.importar',
    'uses' => 'ClienteController@importar',
                ]);
Route::get('/cliente/ver/juridico', [
    'as' => 'cliente.juridico',
    'uses' => 'ClienteController@juridico',
                ]);     
Route::get('/cliente/ver/natural', [
    'as' => 'cliente.natural',
    'uses' => 'ClienteController@natural',
                ]);     

// Usuario
Route::resource('user', 'UserController'); 
Route::post('/nuevo_usuario', [
    'as' => 'users.registrar',
    'uses' => 'UserController@postRegister',
                ]);
Route::get('/exportar_usuarios', [
    'as' => 'users.exportar',
    'uses' => 'UserController@exportar',
                ]);
Route::get('/user/ver/administrador', [
    'as' => 'user.administrador',
    'uses' => 'UserController@administrador',
                ]);     
Route::get('/user/ver/operativo', [
    'as' => 'user.operativo',
    'uses' => 'UserController@operativo',
                ]);     
    
// Route::get('/probando', 'HomeController@index');
    
Route::resource('cotizacion', 'CotizacionController'); 
Route::post('/calcular_cotizacion', [
    'as' => 'cotizaciones.store',
    'uses' => 'CotizacionController@store',
                ]);
Route::get('/cotizaciones', [
    'as' => 'cotizaciones.ultimas',
    'uses' => 'CotizacionController@ultimas',
                ]);
Route::get('/cotizaciones/{id}', [
    'as' => 'cotizaciones.detalle',
    'uses' => 'CotizacionController@detalle',
                ]);
Route::get('/cotizacion/{id}/generar', [
    'as' => 'cotizaciones.pdf',
    'uses' => 'CotizacionController@pdf',
                ]);    
Route::get('/contactos/{cliente_id}', function($cliente_id){

    return \JLcourier\Entities\Contacto::where('cliente_id', $cliente_id)->select('id as value', 'contacto as text')->orderBy('contacto', 'DESC')->get();
    
});
Route::get('/cotizacion/ver/convencional', [
    'as' => 'cotizacion.convencional',
    'uses' => 'CotizacionController@convencional',
                ]);   
Route::get('/cotizacion/ver/express', [
    'as' => 'cotizacion.express',
    'uses' => 'CotizacionController@express',
                ]);     
    
});