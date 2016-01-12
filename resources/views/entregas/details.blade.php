@extends('layout2')

@section('content')
<div class="container">
     <div class="row">
     <div class="col-md-12 col-md-offset-1">
         <h3>
        Items
        @include('entregas/partials/status', compact('entrega'))
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
            
            <table class="table table-bordered">
              <tr>
                <th>Cantidad</th>
                 <th>Peso</th>
                  <th>Envio</th>
                  <th>Descripción</th>
                    </tr>
            
            @foreach ($entrega->items as $item)

            <tr>
     
    <td width="100">{{ $item->cantidad }} unidades</td>
     <td width="100">{{ $item->peso }} kg</td>
     <td width="500">{{ $item->envio }}</td>
     <td width="500">{{ $item->descripcion }}</td>
     
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
