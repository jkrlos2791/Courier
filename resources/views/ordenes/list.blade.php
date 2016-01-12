@extends('layout2')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="row">
              <div class="col-md-12">  
                <h3>
                    Ordenes
                </h3>
                {{--<p class="label label-info news">
                    Hay {{ $ordenes->total() }} Ordenes Recientes
                </p>--}}
                  {!! $ordenes->render() !!}    
                <table class="table table-bordered" >
              <tr>
                <th>Fecha</th>
                 <th>Nro. de Orden</th>
                  <th>Cliente</th>
                  <th>Tipo</th>
                  <th>Tiempo</th>
                  <th>Estado</th>
                  <th>Acciones</th>
                    </tr>  
                @foreach($ordenes as $orden)
                @include('ordenes/partials/item', compact('orden'))
                @endforeach   
                  </table>        
                {!! $ordenes->render() !!}
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

