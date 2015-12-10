<?php

namespace JLcourier\Http\Controllers;

use JLcourier\Entities\OrdenServicio;

use JLcourier\Entities\Entrega;

use JLcourier\Http\Requests;

use JLcourier\Http\Controllers\Controller;
    
use Illuminate\Http\Request; 

use Maatwebsite\Excel\Facades\Excel;

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
        return view("ordenes.create");
    }
    
    public function store(Request $request)
    {
        dd($request->all());
    }
    
}
