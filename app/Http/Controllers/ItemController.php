<?php
namespace JLcourier\Http\Controllers;
use JLcourier\Entities\OrdenServicio;
use JLcourier\Entities\Entrega;
use JLcourier\Entities\ItemEntrega;
use JLcourier\Http\Requests;
use JLcourier\Http\Controllers\Controller;    
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use DB;
use Request;

class ItemController extends Controller
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
    $entrega = Entrega::findOrFail($id);
    return view('items/createEdit', compact('entrega'));
    }
    
    public function store(Request $request, $id)
    {
	$item = new \JLcourier\Entities\ItemEntrega;
 	$item->cantidad = \Request::input('cantidad');  
    $item->peso = \Request::input('peso');      
    $item->envio = \Request::input('envio');
	$item->descripcion = \Request::input('descripcion');
    $entrega = \JLcourier\Entities\Entrega::find($id);      
    $item = $entrega->items()->save($item);          
	return redirect()->route('item.create', ['entrega' => $id])->with('message', 'El item ha sido registrado.');
	}
    
    public function edit($id)
    {
    return view('items.createEdit')->with('item', \JLcourier\Entities\ItemEntrega::find($id));
    }

    public function update(Request $request, $id)
    {  
    $item = \JLcourier\Entities\ItemEntrega::find($id);
	$item->cantidad = \Request::input('cantidad');  
    $item->peso = \Request::input('peso');      
    $item->envio = \Request::input('envio');
	$item->descripcion = \Request::input('descripcion');
	$item->save();
    return redirect()->route('item.edit', ['item' => $id])->with('message', 'El item ha sido actualizado.'); 
    }
    
    public function destroy($id)
	{
	$item = \JLcourier\Entities\ItemEntrega::find($id);
	$item->delete();
	return redirect()->route('ordenes.detalleEntrega', ['entrega' => $item->entrega_id])
           ->with('message', 'El item ha sido eliminado.');
	}
    
}
