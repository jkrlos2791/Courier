<?php

namespace JLcourier\Http\Controllers;

use JLcourier\Entities\OrdenServicio;

use JLcourier\Entities\Entrega;

use JLcourier\Http\Requests;

use JLcourier\Http\Controllers\Controller;
    

use Maatwebsite\Excel\Facades\Excel;

use Carbon\Carbon;
use DB;
use Request;

class EntregaController extends Controller
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
    
    public function create($id)
    {
        $orden = OrdenServicio::findOrFail($id);
        //$fecha = Carbon::now();
        
        //$orden_id = 1 + DB::table('orden_servicios')->max('nro_orden');;
        
        return view('entregas/create', compact('orden'));
    }
    
    public function store(Request $request, $id)
  {
	$entrega = new \JLcourier\Entities\Entrega;
 
	$entrega->cliente_final = \Request::input('cliente_final');
        
    $entrega->direccion_destino = \Request::input('direccion_destino');
        
    $entrega->destino = \Request::input('destino');
	
	$entrega->recepcionado_por = \Request::input('recepcionado_por');

    $entrega->responsable_entrega = \Request::input('responsable_entrega');
        
    $orden = \JLcourier\Entities\OrdenServicio::find($id);      
        
    //$entrega->orden_servicio_id = $orden->id;        
 
	//$entrega->save();
        
    $entrega = $orden->entregas()->save($entrega);        
          
    foreach (Request::get('cantidad') as $key => $val) 
    {
        $item = new \JLcourier\Entities\ItemEntrega;
        $item->cantidad = \Request::input("cantidad.$key");
        $item->peso = \Request::input("peso.$key");
        $item->envio = \Request::input("envio.$key");
        $item->descripcion = \Request::input("descripcion.$key");
        $item = $entrega->items()->save($item);
    } 
        
	return redirect()->action('\JLcourier\Http\Controllers\OrdenController@detalle', ['user' => $id]);
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
