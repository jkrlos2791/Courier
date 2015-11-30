@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            
            <h2>Formulario</h2>
            
            {!! Form::open(['route' => 'ordenes.store', 'method' => 'POST']) !!} 
            
            <p>
            <button type="submit" class="btn btn-primary">Enviar solicitud</button>
            </p>
            
            {!! Form::close() !!}
                        
        </div>
    </div>
</div>
@endsection

