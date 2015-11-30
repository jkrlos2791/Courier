<?php

namespace JLcourier\Http\Controllers;

use JLcourier\Entities\OrdenServicio;

use JLcourier\Entities\Entrega;

use JLcourier\Http\Requests;

use JLcourier\Http\Controllers\Controller;
    
use Illuminate\Http\Request;   

class OrdenController extends Controller
{
    
    
    
    public function ultimas()
    {
        $ordenes = OrdenServicio::orderBy('fecha_inicio', 'DESC')->paginate(20);
        
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
