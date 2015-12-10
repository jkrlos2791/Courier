@extends('layout2')
@section('content')
<div class="container">
	<div class="row">
        <div class="col-md-10 col-md-offset-1">
    <div class="row">
                    <div class="col-md-12">
                        <h1>
                    Clientes
                </h1>
	@if (Session::has('message'))
	        <div class="alert alert-success">{{ Session::get('message') }}</div>
	@endif 
      @if(!$clientes->isEmpty())
             <?php echo $clientes->render(); ?>            
          <table class="table table-bordered">
              <tr>
                 <th>Nombre</th>
                 <th>Direccion</th>
				 <th>Ruc</th>
                 <th>Banco</th>
                 <th colspan="2">Acciones</th>
              </tr>
              @foreach ($clientes as $cliente)
                  <tr>
                    <td width="500">{{ $cliente->nombre }}</td>
                    <td width="500">{{ $cliente->direccion }}</td>
					<td width="500">{{ $cliente->ruc }}</td>
                    <td width="500">{{ $cliente->banco }}</td>
                    <td width="60" align="center">
                      {!! Html::link(route('cliente.edit', $cliente->id), 'Editar', array('class' => 'btn btn-primary')) !!}
                    </td>
                    {{--
                      <td width="60" align="center">
                      {!! Form::open(array('route' => array('cliente.destroy', $cliente->id), 'method' => 'DELETE')) !!}
                          <button type="submit" class="btn btn-danger">Eliminar</button>
                      {!! Form::close() !!}
                    </td>
                      --}}
                  </tr>
              @endforeach
          </table>
          <?php echo $clientes->render(); ?>
      @endif
		</div>
	</div>
            <hr>
            </div>
        </div>
</div>
@endsection