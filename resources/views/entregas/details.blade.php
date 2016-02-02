@extends('layout2')

@section('content')
<div class="container">
     <div class="row">
     <div class="col-md-10 col-md-offset-1">
         <h3>
        Items
        @include('entregas/partials/status', compact('entrega'))
         <a href="{{ route('item.create', $entrega) }}" class="btn btn-primary pull-right">
                 <span class="glyphicon glyphicon-plus">
                            </span> Nueva
             </a>
         </h3>
         </div>
     </div>
    
    <div class="row">
        <div class="col-md-2 col-md-offset-2"><label>Cliente Final:</label> </div>
         <div class="col-md-2">{{ $entrega->cliente_final }}</div>
        <div class="col-md-2"><label>Destino:</label> </div>
        <div class="col-md-2">{{ $entrega->destino }}</div>
    </div>
     <div class="row">
        <div class="col-md-2 col-md-offset-2"><label>Dirección:</label> </div>
         <div class="col-md-2">{{ $entrega->direccion_destino }}</div>
        <div class="col-md-2"><label>Nro de Items:</label> </div>
        <div class="col-md-2">{{ count($entrega->items) }}</div>
    </div>
    
    <br><br>
    
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @if (Session::has('message'))
	            <div class="alert alert-success">{{ Session::get('message') }}</div>
	            @endif   
            <table class="table table-hover">
              <tr>
                <th>Cantidad</th>
                 <th>Peso</th>
                  <th>Envio</th>
                  <th>Descripción</th>
                  <th colspan="2">Acciones</th>
                    </tr>
            
            @foreach ($entrega->items as $item)

            <tr>
     
    <td width="100">{{ $item->cantidad }} unidades</td>
     <td width="100">{{ $item->peso }} kg</td>
     <td width="500">{{ $item->envio }}</td>
     <td width="500">{{ $item->descripcion }}</td>
                    <td>
        <a class="btn btn-primary" href="{{ route('item.edit', $item) }}">
                            <span class="glyphicon glyphicon-pencil">
                            </span>
                        </a>
                </td>
                <td>
        {!! Form::open(array('route' => array('item.destroy', $item->id), 'method' => 'DELETE')) !!}
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
        </div>
    </div>
</div>
@endsection
