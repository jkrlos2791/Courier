@extends('layout2')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-1">
                     <h3>
                    Entrega
                         @include('ordenes/partials/nro_orden', compact('orden'))
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
                    {!! Form::model($orden, ['route' => ['entregas.store', $orden->id], 'method' => 'patch']) !!}          
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
                    <a class="btn btn-primary" href="javascript:void(0)" id="addInput">
				 <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
				  Añadir
			    </a>
			     <br/>
                    <br/>
                    <table class="table table-bordered" id="items">
				        <tr>
                            <th>Cantidad</th>
                            <th>Peso</th>
                            <th>Envio</th>
                            <th>Descripción</th>
                        </tr> 
                        <tr>
			                  <td><input class="form-control" type="text" placeholder="" name="cantidad[]" /></td>
                             <td><input class="form-control" type="text" placeholder="" name="peso[]" /></td>
                             <td> <input class="form-control" type="text" placeholder="" name="envio[]" /></td>
                            <td> <input class="form-control" type="text" placeholder="" name="descripcion[]" /></td>
			                   <td> <a class="btn btn-danger" href="javascript:void(0)" id="remInput">
			        	             <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
					               </a></td>
		                </tr>
		            </table>
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