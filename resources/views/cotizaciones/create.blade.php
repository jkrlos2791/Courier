@extends('layout2')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
             <h3>Nueva Cotización</h3>
            <div class="panel panel-default">
                @if($errors->has())
                    <div class='alert alert-danger'>
                        @foreach ($errors->all('<p>:message</p>') as $message)
                            {!! $message !!}
                        @endforeach
                    </div>
                @endif
		<div class="panel-body">
                <h4>1. Datos de la cotización</h4>
          {!! Form::open(['route' => 'cotizacion.store', 'class' => 'form']) !!}          
         <div class="row">
        <div class="col-md-4"> 
					<div class="form-group">
                        <label>Fecha</label>{!! Form::date('fecha_cotizacion', $fecha , ["class" => "form-control"]) !!}
             </div>
            </div>
                     <div class="col-md-4">
                         <div class="form-group">
								<label>Condiciones de Pago</label><input class="form-control" type="text" placeholder="Nº de dias" name="pago" />
							</div>
                         </div>
	   <div class="col-md-4">
            <div class="form-group">
								<label>Nro. de Cotizacion</label>{!! Form::text('nro_cotizacion', $cotizacion_id , ["class" => "form-control", 'readonly']) !!}
							</div>
           </div>         
          <div class="col-md-6">
              <div class="form-group">
                                <label>Cliente</label>{!! Form::select('cliente_id', [null=>'Seleccione cliente...']+$clientes, null, ["class" => "form-control", 'id' => 'cliente_id']) !!}
          </div> 
              </div> 
                 
             
           <div class="col-md-6">
               <div class="form-group">
								<label>Contacto</label>{!! Form::select('contacto_id',[null=>'Seleccione contacto...']+$contactos, null, ["class" => "form-control", 'id' => 'contacto_id']) !!}
							</div>
						</div>	
           <div class="col-md-6">
               <div class="form-group">
								<label>Tipo de Servicio</label>{!! Form::select('servicio', array('Convencional' => 'Convencional', 'Express' => 'Express'), null,                                                                                          ["class" => "form-control"]) !!}
							</div>
               </div>
            <div class="col-md-6">
                <div class="form-group">
								<label>Tipo de Moneda</label>{!! Form::select('moneda', array('Soles' => 'Soles', 'Dolares' => 'Dolares'), null,                                                                                          ["class" => "form-control"]) !!}
							</div>
                </div>				
            </div>   
    <h4>2. Detalle de la cotización</h4>
<div class="row">
    <div class="col-md-8">
             <a class="btn btn-primary" href="javascript:void(0)" id="addInput">
				 <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
				  Añadir</a>
    </div>
    <div class="col-md-2">
             <input class="form-control" type="text" placeholder="(S/) x Kg" name="costo_peso" />
        </div>
        <div class="col-md-2">
             <input class="form-control" type="text" placeholder="(S/) x m³" name="costo_volumen" />
            </div>
            </div>
            <br/>
                    <br/>
                    <table class="table table-bordered" id="detalleCotizacion">
				        <tr>
                            <th>Cantidad</th>
                            <th>Peso</th>
                            <th>Largo</th>
                            <th>Ancho</th>
                            <th>Alto </th>
                            <th>Descripción</th>
                            <th>Partida</th>
                            <th>Llegada</th>
                        </tr>
                        <tr>
			             <td class="col-md-1"><input class="form-control" type="text" placeholder="Und."name="cantidad[]" /></td>
                             <td class="col-md-1"><input class="form-control" type="text" placeholder="Kg." name="peso[]" /></td>
                             <td class="col-md-1"> <input class="form-control" type="text" placeholder="cm" name="largo[]" /></td>
                            <td class="col-md-1"> <input class="form-control" type="text" placeholder="cm" name="ancho[]" /></td>
                            <td class="col-md-1"> <input class="form-control" type="text" placeholder="cm" name="alto[]" /></td>
                            <td class="col-md-3"><input class="form-control" type="text" placeholder="Descripcion" name="descripcion[]" /></td>
                             <td class="col-md-2"><input class="form-control" type="text" placeholder="partida" name="partida[]" /></td>
                             <td class="col-md-2"> <input class="form-control" type="text" placeholder="llegada" name="llegada[]" /></td>
			                   <td> <a class="btn btn-default" href="javascript:void(0)" id="remInput">
			        	             <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
					               </a></td>
		                </tr>
		            </table>
                <a class="btn btn-primary" href="javascript:void(0)" id="addInput2">
				 <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
				  Costos Adicionales
			    </a>
 <br/>
                    <br/>
            <br/>
                    <table class="table table-bordered" id="costosAdicionales">
				        <tr>
                            <th>Descripcion</th>
                            <th>Monto</th>
                        </tr> 
                        <tr>
			                  <td class="col-md-10"><input class="form-control" type="text" placeholder="Descripcion adicional" name="adicional[]" /></td>
                             <td><input class="form-control" type="text" placeholder="monto" name="monto[]" /></td>
			                   <td> <a class="btn btn-default" href="javascript:void(0)" id="remInput">
			        	             <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
					               </a></td>
		                </tr>
		            </table>
            <div class="form-group">
								{!! Form::submit('Calcular Cotización', ["class" => "btn btn-primary pull-right"]) !!}
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