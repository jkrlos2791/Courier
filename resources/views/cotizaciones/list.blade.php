@extends('layout2')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="row">
             <div class="col-md-12">  
                <h3>
                Cotizaciones				
                </h3>
                {!! Html::nav(config('cotizacionnav.tabs')) !!}                       
                <br/>  
                @if (Session::has('message'))
	            <div class="alert alert-success">{{ Session::get('message') }}</div>
	            @endif   
                {{--<p class="label label-info news">
                    Hay {{ $cotizaciones->total() }} Ordenes Recientes
                </p>--}}
                  {!! $cotizaciones->render() !!}    
                <table class="table table-hover">
              <tr>
			    <th>Nº</th>
                <th>Fecha</th>
				<th>Cliente</th>
				<th>Contacto</th>
				<th>Servicio</th>
                <th>Total</th>
                <th colspan="2">Acciones</th>                  
              </tr>
                @foreach($cotizaciones as $cotizacion)
                @include('cotizaciones/partials/lista', compact('cotizacion'))
                @endforeach      
                  </table>
                {!! $cotizaciones->render() !!}
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
            <br/>
            <br/>
        </div>
    </div>
</div>
@endsection