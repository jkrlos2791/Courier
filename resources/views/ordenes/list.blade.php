@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="row">
                <h1>
                    Ordenes Recientes
                    <a href="#" class="btn btn-primary">
                        Nueva orden                    </a>
                </h1>

                <p class="label label-info news">
                    Hay {{ $ordenes->total() }} Ordenes Recientes
                </p>

                <table class="table table-bordered">
              <tr>
                <th>Fecha</th>
                 <th>Nro. de Orden</th>
                  <th>Tipo</th>
                  <th>Tiempo</th>
                  <th>Cliente</th>
                  <th>Nro. de Entregas</th>
                  <th>Estado</th>
                  <th>Ver</th>
                    </tr>
                    
                @foreach($ordenes as $orden)
                @include('ordenes/partials/item', compact('orden'))
                @endforeach
                  
                  </table>
                
                {!! $ordenes->render() !!}
                
            </div>

            <hr>

            <p><a href="http://shangelperu.com.pe" target="_blank">shangelperu.com.pe</a></p>

        </div>
    </div>
</div>
@endsection

