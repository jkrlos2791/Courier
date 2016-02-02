<?php namespace JLcourier\Http\Controllers;
use JLcourier\Http\Requests\CreateClienteRequest;
use JLcourier\Http\Requests\EditClienteRequest;
use JLcourier\Http\Controllers\Controller;
use Request;
use Maatwebsite\Excel\Facades\Excel;

class ClienteController extends Controller {
    
	public function importar()
    {
    	Excel::load('Clientes.xlsx', function($reader) {
     		foreach ($reader->get() as $cliente) {
     			\JLcourier\Entities\Cliente::create([
     				'id' => $cliente->id,
                    'nombre' => $cliente->nombre,
     				'ruc' =>$cliente->ruc,
     				'banco' =>$cliente->banco
     			]);
      		}
		});     
        Excel::load('Ordenes.xlsx', function($reader) {
     		foreach ($reader->get() as $orden) {
     			\JLcourier\Entities\OrdenServicio::create([
     				'id' => $orden->id,
                    'cliente_id' => $orden->cliente_id,
     				'fecha_inicio' =>$orden->fecha_inicio,
     				'nro_orden' =>$orden->nro_orden,
                    'tipo' =>$orden->tipo,
                    'tiempo' =>$orden->tiempo,
                    'estado' =>$orden->estado
     			]);
      		}
		});        
		return \JLcourier\Entities\Cliente::all();
    }
    
    public function exportar()
	{
		Excel::create('Clientes', function($excel) {
            $excel->sheet('Clientes', function($sheet) {
                $clientes = \JLcourier\Entities\Cliente::all();
                $sheet->fromArray($clientes); 
            });
        })->export('xls');
	}

	public function index()
	{
		 return view("clientes.index")->with('clientes', \JLcourier\Entities\Cliente::paginate(10)->setPath('cliente'));
	}
    
    public function juridico()
	{
		 return view("clientes.index")->with('clientes', \JLcourier\Entities\Cliente::where('tipo', '=', 'jurídica')->paginate(10)->setPath('cliente'));
	}
    
    public function natural()
	{
		 return view("clientes.index")->with('clientes', \JLcourier\Entities\Cliente::where('tipo', '=', 'natural')->paginate(10)->setPath('cliente'));
	}
    
	public function create()
	{
		return view("clientes.createUpdate");
	}

	public function store(CreateClienteRequest $request)
	{
	$cliente = new \JLcourier\Entities\Cliente;
	$cliente->nombre = \Request::input('nombre');   
    $cliente->direccion = \Request::input('direccion'); 
    $cliente->ruc = \Request::input('ruc');
	$cliente->banco = \Request::input('banco');
	$cliente->save();     
    foreach (Request::get('contacto') as $key => $val) 
    {
        $contacto = new \JLcourier\Entities\Contacto;
        $contacto->contacto = \Request::input("contacto.$key");
        $contacto->fijo = \Request::input("fijo.$key");
        $contacto->celular = \Request::input("celular.$key");
        $contacto = $cliente->contactos()->save($contacto);
    }      
	return redirect()->route('cliente.create')->with('message', 'El cliente ha sido registrado.');    
	}

	public function show($id)
	{
	}

	public function edit($id)
	{
    return view('clientes.createUpdate')->with('cliente', \JLcourier\Entities\Cliente::find($id));
	}

	public function update(EditClienteRequest $request, $id)
	{
	$cliente = \JLcourier\Entities\Cliente::find($id);
	$cliente->nombre = \Request::input('nombre');
	$cliente->direccion = \Request::input('direccion');
    $cliente->ruc = \Request::input('ruc');
	$cliente->banco = \Request::input('banco');
	$cliente->save();
	return redirect()->route('cliente.edit', ['cliente' => $id])->with('message', 'El cliente ha sido actualizado.');
	}

	public function destroy($id)
	{
	$cliente = \JLcourier\Entities\Cliente::find($id);
	$cliente->delete();
	return redirect()->route('cliente.index')->with('message', 'El cliente ha sido eliminado.');
	}

}