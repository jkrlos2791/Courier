@extends('layout2')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-1">
                     <h3>
                    Entrega
                    @include('ordenes/partials/nro_orden_edit', compact('entrega')) 
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
                    {!! Form::model($entrega, ['route' => ['entrega.update', $entrega->id], 'method' => 'patch']) !!}          
							<div class="form-group">
								<label>Cliente Final</label>{!! Form::text('cliente_final', null , ["class" => "form-control"]) !!}
							</div>
	                        <div class="form-group">
								<label>Dirección</label>{!! Form::text('direccion_destino', null , ["class" => "form-control"]) !!}
							</div>
                      	    <div class="form-group">
								<label>Destino</label>{!! Form::text('destino', null , ["class" => "form-control"]) !!}
							</div>	
							<div class="form-group">
								<label>Recepcionado por</label>{!! Form::text('recepcionado_por', null , ["class" => "form-control"]) !!}
							</div>
<div class="form-group">
								<label>Entregado por</label>{!! Form::text('responsable_entrega', null , ["class" => "form-control"]) !!}
							</div>	
<div class="form-group">
								<label>Estado</label>{!! Form::select('estado', array('En almacen' => 'En almacen', 'En ruta' => 'En ruta', 'Entregado' => 'Entregado'), null,                                                                                          ["class" => "form-control"]) !!}
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