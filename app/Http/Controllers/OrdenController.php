<?php

namespace JLcourier\Http\Controllers;

use JLcourier\Entities\OrdenServicio;

use JLcourier\Http\Requests;

use JLcourier\Http\Controllers\Controller;
    
use Illuminate\Http\Request;   

class OrdenController extends Controller
{
    
    
    
    public function ultimas()
    {
        $ordenes = OrdenServicio::orderBy('created_at', 'DESC')->paginate(20);
        
        return view('ordenes/list', compact('ordenes'));
    }

    public function detalle($id)
    {
        
        $orden = OrdenServicio::findOrFail($id);
                
        return view('ordenes/details', compact('orden'));
    }
}
