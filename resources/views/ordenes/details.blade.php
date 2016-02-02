@extends('layout2')

@section('content')
<div class="container">
     <div class="row">
     <div class="col-md-10 col-md-offset-1">
         <h3>
        Entregas
       @include('ordenes/partials/status', compact('orden'))
             <a href="{{ route('entregas.create', $orden) }}" class="btn btn-primary pull-right">
                 <span class="glyphicon glyphicon-plus">
                            </span> Nueva
             </a>
         </h3> 
         
         </div>
     </div>
    
    <div class="row">
        <div class="col-md-2 col-md-offset-2"><label>Fecha:</label> </div>
         <div class="col-md-2">{{ $orden->fecha_inicio }}</div>
        <div class="col-md-2"><label>Tipo de servicio:</label> </div>
        <div class="col-md-2">{{ $orden->tipo }}</div>
    </div>
     <div class="row">
        <div class="col-md-2 col-md-offset-2"><label>N° de orden:</label> </div>
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
             @if (Session::has('message'))
	            <div class="alert alert-success">{{ Session::get('message') }}</div>
	            @endif   
            <table class="table table-hover">
              <tr>
                <th>Cliente Final</th>
                  <th>Destino</th>
                  <th>Recepcionado por</th>
                  <th>Nro. de Items</th>
                  <th>Entregado por</th>
                  <th>Estado</th>
                  <th colspan="3">Acciones</th>
                    </tr>
            
            @foreach ($orden->entregas as $entrega)

            <tr>   
    <td width="550">{{ $entrega->cliente_final }}</td>
     <td width="150">{{ $entrega->destino }}</td>
     <td width="300">{{ $entrega->recepcionado_por }}</td>
      <td width="250">{{ count($entrega->items) }} items</td>
    <td width="300">{{ $entrega->responsable_entrega }}</td>
     <td width="100"> @include('entregas/partials/status', compact('entrega'))</td>
    <td>
        <a class="btn btn-primary" href="{{ route('ordenes.detalleEntrega', $entrega) }}">
                            <span class="glyphicon glyphicon-list-alt">
                            </span>
                        </a>
                </td>
                <td>
        <a class="btn btn-primary" href="{{ route('entrega.edit', $entrega) }}">
                            <span class="glyphicon glyphicon-pencil">
                            </span>
                        </a>
                </td>
                <td>
        {!! Form::open(array('route' => array('entrega.destroy', $entrega->id), 'method' => 'DELETE')) !!}
                          <button type="submit" class="btn btn-default">
                              <span class="glyphicon glyphicon-trash">
                            </span></button>
                      {!! Form::close() !!}
                </td>
</tr>
            
            @endforeach
                
                </table>
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
