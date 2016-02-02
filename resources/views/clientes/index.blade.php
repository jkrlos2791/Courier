@extends('layout2')
@section('content')
<div class="container">
	<div class="row">
        <div class="col-md-10 col-md-offset-1">
    <div class="row">
                    <div class="col-md-12">
                        <h3>
                    Clientes
                </h3>
                                                

{!! Html::nav(config('clientenav.tabs')) !!}
                        
  <br/> 
	@if (Session::has('message'))
	        <div class="alert alert-success">{{ Session::get('message') }}</div>
	@endif 
      @if(!$clientes->isEmpty())
             <?php echo $clientes->render(); ?>            
          <table class="table table-hover">
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
                    <td width="800">{{ $cliente->direccion }}</td>
					<td width="100">{{ $cliente->ruc }}</td>
                    <td width="150">{{ $cliente->banco }}</td>
                    <td>
                       <a class="btn btn-primary" href="{{ route('cliente.edit', $cliente) }}">
                            <span class="glyphicon glyphicon-pencil">
                            </span>
                        </a>
                    </td>
                      <td>
                      {!! Form::open(array('route' => array('cliente.destroy', $cliente->id), 'method' => 'DELETE')) !!}
                          <button type="submit" class="btn btn-default">
                              <span class="glyphicon glyphicon-trash">
                            </span></button>
                      {!! Form::close() !!}
                    </td>
                  </tr>
              @endforeach
          </table>
          <?php echo $clientes->render(); ?>
      @endif
		</div>
	</div>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            </div>
        </div>
</div>
@endsection