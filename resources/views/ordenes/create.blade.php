@extends('layout2')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-1">
                     <h3>
                    Orden
                </h3>
            <div class="panel panel-default">
                @if($errors->has())
                    <div class='alert alert-danger'>
                        @foreach ($errors->all('<p>:message</p>') as $message)
                            {!! $message !!}
                        @endforeach
                    </div>
                @endif
				@if (Session::has('message'))
				    <div class="alert alert-success">{{ Session::get('message') }}</div>
				@endif
				<div class="panel-body">   
                    {!! Form::open(['route' => 'ordenes.store']) !!}           
							<div class="form-group">
								<label>Fecha</label>{!! Form::date('fecha_inicio', $fecha , ["class" => "form-control"]) !!}
							</div>
	                        <div class="form-group">
								<label>Nro. de Orden</label>{!! Form::text('nro_orden', $orden_id , ["class" => "form-control", 'readonly']) !!}
							</div>
                      	    <div class="form-group">
								<label>Cliente</label>{!! Form::select('cliente_id', ['Seleccione...']+$clientes , null, ["class" => "form-control"]) !!}
							</div>
                          <div class="form-group">
								<label>Punto de Recojo</label>{!! Form::text('punto_recojo', null, ["class" => "form-control"]) !!}
							</div>
 <div class="form-group">
								<label>Dirección de Recojo</label>{!! Form::text('direccion_recojo', null, ["class" => "form-control"]) !!}
							</div>
							<div class="form-group">
								<label>Tipo</label>{!! Form::select('tipo', array('Local' => 'Local', 'Nacional' => 'Nacional'), null,                                                                                          ["class" => "form-control"]) !!}
							</div>
<div class="form-group">
								<label>Tiempo</label>{!! Form::select('tiempo', array('12 horas' => '12 horas', '1 día' => '1 día', '2 días' => '2 días', '3 días' => '3 días', '4 días' => '4 días', '5 días' => '5 días', '6 días' => '6 días', '7 días' => '7 días'), null,                                                                                          ["class" => "form-control"]) !!}
							</div>
                      
                    <div class="form-group">
								<label>Estado</label>{!! Form::select('estado', array('En proceso' => 'En proceso', 'Despachado' => 'Despachado'), null,                                                                                          ["class" => "form-control"]) !!}
							</div>
                   
                    
							<div class="form-group">
								{!! Form::submit('Guardar', ["class" => "btn btn-primary pull-right"]) !!}
							</div>
					{!! Form::close() !!}     
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
		</div>      
	</div>
    </div>
@endsection