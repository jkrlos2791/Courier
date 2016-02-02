@extends('layout2')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-1">
                     <h3>
                    Item
                </h3>
            <div class="panel panel-default">
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
                @if(isset($item))
                    {!! Form::model($item, ['route' => ['item.update', $item->id], 'method' => 'patch']) !!}
                @else    
                    {!! Form::model($entrega, ['route' => ['item.store', $entrega->id], 'method' => 'patch']) !!} 
                @endif    
							<div class="form-group">
								<label>Cantidad</label>{!! Form::text('cantidad', null, ["class" => "form-control"]) !!}
							</div>
	                        <div class="form-group">
								<label>Peso</label>{!! Form::text('peso', null, ["class" => "form-control"]) !!}
							</div>
                      	    <div class="form-group">
								<label>Envio</label>{!! Form::text('envio', null, ["class" => "form-control"]) !!}
							</div>	
                            <div class="form-group">
								<label>Descripción</label>{!! Form::text('descripcion', null, ["class" => "form-control"]) !!}
							</div>	
							<div class="form-group">
								{!! Form::submit('Guardar', ["class" => "btn btn-primary pull-right"]) !!}
							</div>
					{!! Form::close() !!}     
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
		</div>      
	</div>
    </div>
@endsection