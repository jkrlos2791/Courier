@extends('layout')

@section('content')
<div class="container">
     <div class="row">
     <div class="col-md-12 col-md-offset-1">
         <h1>
        Detalle de la orden
       @include('ordenes/partials/status', compact('orden'))
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
                 <th>Dirección</th>
                  <th>Destino</th>
                  <th>Recepcionado por</th>
                  <th>Nro. de Items</th>
                  <th>Entregado por</th>
                  <th>Estado</th>
                  <th>Ver</th>
                    </tr>
            
            @foreach ($orden->entregas as $entrega)

            <tr>
     
    <td width="500">{{ $entrega->cliente_final }}</td>
   <td width="500">{{ $entrega->direccion_destino }}</td>
     <td width="500">{{ $entrega->destino }}</td>
     <td width="500">{{ $entrega->recepcionado_por }}</td>
      <td width="500">{{ count($entrega->items) }} items</td>
    <td width="500">{{ $entrega->responsable_entrega }}</td>
     <td width="500"> @include('entregas/partials/status', compact('entrega'))</td>
    <td width="500"><a href="{{ route('ordenes.detalleEntrega', $entrega) }}">
                            <span class="comments-count">
                                Detalle
                            </span>
                        </a></td>
     
</tr>
            
            @endforeach
                
                </table>

        </div>
    </div>
</div>
@endsection
