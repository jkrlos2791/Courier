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
             ->select('orden_servicios.fecha_inicio', 'orden_servicios.nro_orden', 'nombre', 'orden_servicios.tipo',  
                      'orden_servicios.tiempo', 'orden_servicios.estado')
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
    $entrega->estado = \Request::input('estado');    
    $orden = \JLcourier\Entities\OrdenServicio::find($id);      
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
	return redirect()->route('entregas.create', ['orden' => $id])->with('message', 'La entrega ha sido registrada.');
	}
    
    public function edit($id)
    {
    return view('entregas.edit')->with('entrega', \JLcourier\Entities\Entrega::find($id));
    }

    public function update(Request $request, $id)
    {  
    $entrega = \JLcourier\Entities\Entrega::find($id);
	$entrega->cliente_final = \Request::input('cliente_final');  
    $entrega->direccion_destino = \Request::input('direccion_destino');      
    $entrega->destino = \Request::input('destino');
	$entrega->recepcionado_por = \Request::input('recepcionado_por');
    $entrega->responsable_entrega = \Request::input('responsable_entrega');    
    $entrega->estado = \Request::input('estado');    
	$entrega->save();
    return redirect()->route('entrega.edit', ['entrega' => $id])->with('message', 'La entrega ha sido actualizada.'); 
    }
    
    public function destroy($id)
	{
	$entrega = \JLcourier\Entities\Entrega::find($id);
	$entrega->delete();
	return redirect()->route('ordenes.detalle', ['orden' => $entrega->orden_servicio_id])
           ->with('message', 'La entrega ha sido eliminada.');
	}
    
}
