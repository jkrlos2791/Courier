<?php namespace JLcourier\Http\Controllers;

use JLcourier\Http\Requests\ClienteForm;
use JLcourier\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ClienteController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		{
		 return view("clientes.index")->with('clientes', \JLcourier\Entities\Cliente::paginate(10)->setPath('cliente'));
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		{
		return view("clientes.createUpdate");
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(ClienteForm $clienteForm)
	{
	$cliente = new \JLcourier\Entities\Cliente;
 
	$cliente->nombre = \Request::input('nombre');
        
    $cliente->direccion = \Request::input('direccion');
        
    $cliente->ruc = \Request::input('ruc');
	
	$cliente->banco = \Request::input('banco');
 
	$cliente->save();
 
	return redirect('cliente/create')->with('message', 'Cliente saved');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return view('clientes.createUpdate')->with('cliente', \JLcourier\Entities\Cliente::find($id));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(ClienteForm $clienteForm, $id)
	{
	$cliente = \JLcourier\Entities\Cliente::find($id);
 
	$cliente->nombre = \Request::input('nombre');
 
	$cliente->direccion = \Request::input('direccion');
    
    $cliente->ruc = \Request::input('ruc');
	
	$cliente->banco = \Request::input('banco');
 
	$cliente->save();
 
	return redirect()->route('cliente.edit', ['cliente' => $id])->with('message', 'Cliente updated');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
	$cliente = \JLcourier\Entities\Cliente::find($id);
 
	$cliente->delete();
 
	return redirect()->route('cliente.index')->with('message', 'Cliente deleted');
	}

}
