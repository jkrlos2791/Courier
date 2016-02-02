<?php namespace JLcourier\Http\Controllers;
use JLcourier\Http\Requests\CreateOrdenRequest;
use JLcourier\Http\Requests\EditOrdenRequest;
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
    
    public function generarOrden($id)
    {
    $nro=0;    
    $orden = OrdenServicio::findOrFail($id);        
    $view =  \View::make('ordenes.pdf', compact('orden', 'nro'));
    $pdf = \App::make('snappy.pdf.wrapper');
    $pdf->loadHTML($view);
    //return view('ordenes.pdf', compact('orden', 'nro'));    
    return $pdf->stream('pdf');            
    }  
    
    public function exportar()
	{
		Excel::create('Ordenes', function($excel) {
        $excel->sheet('Ordenes', function($sheet) {
        $ordenes = \JLcourier\Entities\Cliente::join('orden_servicios', 'clientes.id', '=', 'orden_servicios.cliente_id')
        ->select('orden_servicios.fecha_inicio', 'orden_servicios.nro_orden', 'nombre',    
                 'orden_servicios.tipo','orden_servicios.tiempo', 'orden_servicios.estado')->get();
        $sheet->fromArray($ordenes);
        });
        })->export('xls');
	}
    
    public function ultimas()
    {
        $ordenes = OrdenServicio::orderBy('nro_orden', 'DESC')->paginate(20);    
        return view('ordenes/list', compact('ordenes'));
    }
    
    public function despachado()
    {
        $ordenes = OrdenServicio::orderBy('nro_orden', 'DESC')->where('estado', '=', 'Despachado')->paginate(20);
        return view('ordenes/list', compact('ordenes'));
    }
    
    public function enProceso()
    {
        $ordenes = OrdenServicio::orderBy('nro_orden', 'DESC')->where('estado', '=', 'En proceso')->paginate(20);
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
    
    public function store(CreateOrdenRequest $request)
    {
       $orden = new \JLcourier\Entities\OrdenServicio;
	   $orden->cliente_id = \Request::input('cliente_id');
       $orden->fecha_inicio = \Request::input('fecha_inicio');
       $orden->nro_orden = \Request::input('nro_orden');
       $orden->tipo = \Request::input('tipo');
       $orden->tiempo = \Request::input('tiempo');
       $orden->estado = \Request::input('estado'); 
       $orden->punto_recojo = \Request::input('punto_recojo');
       $orden->direccion_recojo = \Request::input('direccion_recojo');
       $orden->save();
       return redirect()->route('ordenes.create')->with('message', 'La orden ha sido registrada.');    
    }
    
    public function edit($id)
    {
       return view('ordenes.update')->with('orden', \JLcourier\Entities\OrdenServicio::find($id));
    }

    public function update(EditOrdenRequest $request, $id)
    {
       $orden = \JLcourier\Entities\OrdenServicio::find($id);
       $orden->cliente_id = \Request::input('cliente_id');
       $orden->fecha_inicio = \Request::input('fecha_inicio');
       $orden->nro_orden = \Request::input('nro_orden');
       $orden->tipo = \Request::input('tipo');
       $orden->tiempo = \Request::input('tiempo');
       $orden->estado = \Request::input('estado'); 
       $orden->punto_recojo = \Request::input('punto_recojo');
       $orden->direccion_recojo = \Request::input('direccion_recojo');
       $orden->save();
       return redirect()->route('ordenes.edit', ['orden' => $id])->with('message', 'La orden ha sido actualizada.');
    }
    
    public function destroy($id)
	{
	$orden = \JLcourier\Entities\OrdenServicio::find($id);
	$orden->delete();
	return redirect()->route('ordenes.ultimas')->with('message', 'La orden ha sido eliminada.');
	}

}