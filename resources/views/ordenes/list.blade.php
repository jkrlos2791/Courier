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
{!! Html::nav(config('ordennav.tabs')) !!}                       
  <br/>                   
        {{--    {!! Form::open(['route' => 'ordenes.ultimas', 'method' => 'GET']) !!}
                <div class="input-group">
                {!! Form::text('nombre', null, ["class" => "form-control", "placeholder" => "Cliente"]) !!}
                <span class="input-group-btn">
                <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                </span>
                </div>
                {!! Form::close() !!} --}}   
                @if (Session::has('message'))
	            <div class="alert alert-success">{{ Session::get('message') }}</div>
	            @endif   
                {{--<p class="label label-info news">
                    Hay {{ $ordenes->total() }} Ordenes Recientes
                </p>--}}
                  {!! $ordenes->render() !!}    
                <table class="table table-hover" >
              <tr>
                  <th>N°</th>
                  <th>Fecha</th>
                  <th>Cliente</th>
                  <th>Tipo</th>
                  <th>Tiempo</th>
                  <th>Estado</th>
                  <th colspan="4">Acciones</th>
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