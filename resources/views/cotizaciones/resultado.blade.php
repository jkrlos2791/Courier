@extends('layout2')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="row">
            <div class="col-md-10">
								 <h1>Cotización Nº. {{ $cotizacion->nro_cotizacion }}</h1>
            </div>
            </div>

		<h3 style="font-size: 20px;">1. Datos del solicitante</h3></br>
    
        
       <table class="table border 0 ">
         <div class="row">

                  <div class="col-md-2">   
                 <label>Señor(es): &nbsp;</label>
                  </div>
                <div class="col-md-4">   
                 {{ $cotizacion->cliente->nombre }}
                  </div>
          </div>
        <div class="row">
                     <div class="col-md-2">   
                 <label>Contacto: &nbsp;</label>
                  </div>
            <div class="col-md-4">   
                 {{ $cotizacion->contacto->contacto }}
                  </div>
         </div>
        <div class="row">
                     <div class="col-md-2">
                 <label>Tipo Servicio: &nbsp;</label>
                  </div> 
            <div class="col-md-4">
             {{ $cotizacion->servicio }}
                  </div>
         </div>

            </br>
			<h3 style="font-size: 20px;">2. Detalle de la cotización</h3>
    </table>
    <div class="row">
        
            <div class="col-md-6"> 
								<label>Costo x Peso: </label>&nbsp; @foreach($cotizacion->detallesCotizaciones as $detalle){{ $detalle->costo_peso }}@endforeach
             </div>
	       <div class="col-md-6">
								<label>Costo x Cotizacion: </label>&nbsp; @foreach($cotizacion->detallesCotizaciones as $detalle){{ $detalle->costo_volumen }}@endforeach
           </div>
    </div><br><br>
        <table class="table table-bordered center">
             <center> <tr>
                <th>Nº</th>
                <th>Descripcion</th>
				<th>Cantidad</th>
				<th>Peso Unid</th>
                <th>Largo</th>
                <th>Ancho</th>
                <th>Alto</th>
                <th>Partida</th>
				<th>Llegada</th>
				<th>Monto Total</th>
                    </tr></center>
                    
                @foreach($cotizacion->detallesCotizaciones as $detalle)
                @include('cotizaciones/partials/item', compact('detalle', 'nro1'))
                @endforeach
           <tr>
     <td COLSPAN=9 align="right"><strong>SUBTOTAL</strong></td>  
    <td>S/ {{ number_format( $cotizacion->subtotal1,2) }}</td> 
</tr>        
        </table>
      </br>
			<h3 style="font-size: 20px;">3. Detalle Adicional</h3>
        <table class="table table-bordered">
              <tr>
                <th width="50">Nº</th>
                <th width="800">Descripcion</th>
				<th width="200">Monto Total</th>
                    </tr>
                    
                @foreach($cotizacion->adicionalesCotizaciones as $adicional)
                @include('cotizaciones/partials/detalle', compact('adicional'))
                @endforeach
                 <tr>
     <td COLSPAN=2 align="right" width="100"><strong>SUBTOTAL</strong></td>  
    <td>S/ {{ number_format($cotizacion->subtotal2,2) }}</td>  
</tr>         
        </table>
        
        </br>
			
        <table class="table border 0">
              <tr>
                <td width="400" align="right"><strong>TOTAL</strong></td>
                <td width="100" align="left" size="30"><strong>S/ {{ $cotizacion->total }}</strong></td>
            </tr>
        </table>
            <p>
           <button type="submit" class="btn btn-primary pull-right">Guardar Cotización</button>
            </p>
  
        </div>
    </div>
</div>
@endsection

