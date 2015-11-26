@extends('layout')

@section('content')
<div class="container">
     <div class="row">
     <div class="col-md-12 col-md-offset-1">
         <h1>
        Detalle de la orden
        </h1>
         </div>
     </div>
    
    <div class="row">
        <div class="col-md-2 col-md-offset-2"><label>Fecha:</label> </div>
         <div class="col-md-2">{{ $orden->fecha_inicio->format('d/m/Y') }}</div>
        <div class="col-md-2"><label>Tipo de servicio:</label> </div>
        <div class="col-md-2">{{ $orden->tipo }}</div>
    </div>
     <div class="row">
        <div class="col-md-2 col-md-offset-2"><label>Nro. de orden:</label> </div>
         <div class="col-md-2">{{ $orden->nro_orden }}</div>
        <div class="col-md-2"><label>Tiempo de servicio:</label> </div>
        <div class="col-md-2">{{ $orden->tiempo }}</div>
    </div>
     <div class="row">
        <div class="col-md-2 col-md-offset-2"><label>Cliente:</label> </div>
         <div class="col-md-2">{{ $orden->cliente->nombre }}</div>
        <div class="col-md-2"><label>Nro. de entregas:</label> </div>
        <div class="col-md-2">{{ count($orden->entregas) }}</div>
    </div>
    
    <br><br>
    
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            
            <table class="table table-bordered">
              <tr>
                <th>Cliente Final</th>
                 <th>Destino</th>
                  <th>Dirección</th>
                  <th>Recepcionado por</th>
                  <th>Entregado por</th>
                  <th>Observaciones</th>
                  <th>Estado</th>
                    </tr>
            
            @foreach ($orden->entregas as $entrega)

            <tr>
     
    <td width="500">{{ $entrega->cliente_final }}</td>
     <td width="500">{{ $entrega->destino }}</td>
     <td width="500">{{ $entrega->direccion_destino }}</td>
     <td width="500">{{ $entrega->recepcionado_por }}</td>
    <td width="500">{{ $entrega->responsable_entrega }}</td>
    <td width="500">{{ $entrega->observaciones }}</td> 
    <td width="500">{{ $entrega->estado }}</td>
     
</tr>
            
            @endforeach
                
                </table>

        </div>
    </div>
</div>
@endsection
