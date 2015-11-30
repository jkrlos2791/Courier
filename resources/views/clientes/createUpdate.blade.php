@extends('layout')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Nuevo Cliente</div>

                @if($errors->has())
                    <div class='alert alert-danger'>
                        @foreach ($errors->all('<p>:message</p>') as $message)
                            {!! $message !!}
                        @endforeach
                    </div>
                @endif

				@if (Session::has('message'))
				    <div class="alert alert-success">{{ Session::get('message') }}</div>
				@endif

				<div class="panel-body">
					
                @if(isset($cliente))
                    {!! Form::model($cliente, ['route' => ['cliente.update', $cliente->id], 'method' => 'patch']) !!}
                @else    
                    {!! Form::open(['route' => 'cliente.store']) !!}
                @endif    

							<div class="form-group">
								<h3>Nombre</h3>{!! Form::text('nombre', null, ["class" => "form-control"]) !!}
							</div>

	                        <div class="form-group">
								<h3>Direccion</h3>{!! Form::text('direccion', null, ["class" => "form-control"]) !!}
							</div>
                    
                    	    <div class="form-group">
								<h3>Ruc</h3>{!! Form::text('ruc', null, ["class" => "form-control"]) !!}
							</div>
							
							<div class="form-group">
								<h3>Banco</h3>{!! Form::text('banco', null, ["class" => "form-control"]) !!}
							</div>

							<div class="form-group">
								{!! Form::submit('Enviar', ["class" => "btn btn-success btn-block"]) !!}
							</div>

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
    <div class="row">
	<div class="col-md-3 pull-right">
		{!! Html::link(route('cliente.index'), 'Regresar', array('class' => 'btn btn-info btn-md pull-right')) !!}
       </div>
</div>
@endsection