@extends('layout2')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-1">
                     <h1>
                    Usuario
                </h1>
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
                @if(isset($user))
                    {!! Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'patch']) !!}
                @else    
                    {!! Form::open(['route' => 'users.registrar']) !!}
                @endif    
							<div class="form-group">
								<label>Nombre</label>{!! Form::text('name', null, ["class" => "form-control"]) !!}
							</div>
	                        <div class="form-group">
								<label>Email</label>{!! Form::text('email', null, ["class" => "form-control"]) !!}
							</div>
                    	    <div class="form-group">
								<label>Password</label>{!! Form::password('password', ["class" => "form-control"]) !!}
							</div>
                            <div class="form-group">
								<label>Confirmar Password</label>{!! Form::password('password_confirmation', ["class" => "form-control"]) !!}
							</div>
							<div class="form-group">
								{!! Form::submit('Guardar', ["class" => "btn btn-primary pull-right"]) !!}
							</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
    </div>
@endsection