<?php

namespace JLcourier\Http\Controllers;

use JLcourier\Entities\OrdenServicio;

use JLcourier\Entities\Entrega;

use JLcourier\Http\Requests;

use JLcourier\Http\Controllers\Controller;
    
use Illuminate\Http\Request; 

use Maatwebsite\Excel\Facades\Excel;

use Carbon\Carbon;
use DB;

class OrdenController extends Controller
{
    
    public function exportar()
	{
		Excel::create('Ordenes', function($excel) {
 
            $excel->sheet('Ordenes', function($sheet) {
 
               $ordenes = \JLcourier\Entities\Cliente::join('orden_servicios', 'clientes.id', '=', 'orden_servicios.cliente_id')
                    ->select('orden_servicios.fecha_inicio', 'orden_servicios.nro_orden', 'nombre', 'orden_servicios.tipo', 'orden_servicios.tiempo'
                            , 'orden_servicios.estado')
                    ->get();
 
                $sheet->fromArray($ordenes);
 
            });
        })->export('xls');
	}
    
    public function ultimas()
    {
        $ordenes = OrdenServicio::orderBy('fecha_inicio', 'DESC')->paginate(20);
        
        return view('ordenes/list', compact('ordenes'));
    }
    
    public function enProceso()
    {
        $ordenes = OrdenServicio::orderBy('fecha_inicio', 'DESC')->where('estado', '=', 'En proceso')->paginate(20);
        
        return view('ordenes/list', compact('ordenes'));
    }

    public function detalle($id)
    {
        
        $orden = OrdenServicio::findOrFail($id);
                
        return view('ordenes/details', compact('orden'));
    }
    
    public function detalleEntrega($id)
    {
        
        $entrega = Entrega::findOrFail($id);
                
        return view('entregas/details', compact('entrega'));
    }
    
    public function create()
    {
        
        $fecha = Carbon::now();
        
        $orden_id = 1 + DB::table('orden_servicios')->max('nro_orden');;
        
        return view('ordenes/create', compact('fecha', 'orden_id'));
    }
    
    public function store(Request $request)
    {
       $orden = new \JLcourier\Entities\OrdenServicio;
 
	$orden->cliente_id = \Request::input('cliente_id');
        
    $orden->fecha_inicio = \Request::input('fecha_inicio');
        
    $orden->nro_orden = \Request::input('nro_orden');
        
    $orden->tipo = \Request::input('tipo');
        
    $orden->tiempo = \Request::input('tiempo');
 
	$orden->save();
 
	return redirect()->action('\JLcourier\Http\Controllers\OrdenController@ultimas');
    }
    
    public function edit($id)
    {
        return view('ordenes.update')->with('orden', \JLcourier\Entities\OrdenServicio::find($id));
    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
    public function update(OrdenForm $ordenForm, $id)
    {
        
    $orden = \JLcourier\Entities\OrdenServicio::find($id);
 
	$orden->cliente_id = \Request::input('cliente_id');
        
    $orden->fecha_inicio = \Request::input('fecha_inicio');
        
    $orden->nro_orden = \Request::input('nro_orden');
        
    $orden->tipo = \Request::input('tipo');
        
    $orden->tiempo = \Request::input('tiempo');
    
	$orden->save();
 
	return redirect()->route('ordenes.edit', ['orden' => $id])->with('message', 'Orden updated');
        
    }
    
}
