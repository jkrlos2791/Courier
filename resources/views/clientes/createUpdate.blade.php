@extends('layout2')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-1">
                     <h3>
                    Cliente
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
                @if(isset($cliente))
                    {!! Form::model($cliente, ['route' => ['cliente.update', $cliente->id], 'method' => 'patch']) !!}
                @else    
                    {!! Form::open(['route' => 'cliente.store']) !!}
                @endif    
							<div class="form-group">
								<label>Nombre</label>{!! Form::text('nombre', null, ["class" => "form-control"]) !!}
							</div>
	                        <div class="form-group">
								<label>Direccion</label>{!! Form::text('direccion', null, ["class" => "form-control"]) !!}
							</div>
                      	    <div class="form-group">
								<label>Ruc</label>{!! Form::text('ruc', null, ["class" => "form-control"]) !!}
							</div>	
							<div class="form-group">
								<label>Banco</label>{!! Form::select('banco', array('BCP' => 'BCP', 'BBVA Continental' => 'BBVA Continental',                                                                                                'Interbank' => 'Interbank', 'Scotiabank' => 'Scotiabank'), null,                                                                                          ["class" => "form-control"]) !!}
							</div>
                    <a class="btn btn-primary" href="javascript:void(0)" id="addInput">
				 <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
				  Añadir
			    </a>
			     <br/>
                    <br/>
                    <table class="table table-bordered" id="dynamicDiv">
				        <tr>
                            <th>Contacto</th>
                            <th>Fijo</th>
                            <th>Celular</th>
                            <th>Eliminar</th>
                        </tr> 
                        <tr>
			                  <td><input class="form-control" type="text" placeholder="Ejm: Juan Ramos" name="contacto[]" /></td>
                             <td><input class="form-control" type="text" placeholder="Ejm: 123-4567" name="fijo[]" /></td>
                             <td> <input class="form-control" type="text" placeholder="Ejm: 987654321" name="celular[]" /></td>
			                   <td> <a class="btn btn-default" href="javascript:void(0)" id="remInput">
			        	             <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
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
		</div>      
	</div>
    </div>
@endsection