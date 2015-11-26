@extends('menu')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>

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
                    {!! Form::open(['route' => 'user.store']) !!}
                @endif    

							<div class="form-group">
								{!! Form::text('name', null, ["class" => "form-control"]) !!}
							</div>

	                        <div class="form-group">
								{!! Form::text('email', null, ["class" => "form-control"]) !!}
							</div>
                    
                    	    <div class="form-group">
								{!! Form::text('password', null, ["class" => "form-control"]) !!}
							</div>

							<div class="form-group">
								{!! Form::submit('Send', ["class" => "btn btn-success btn-block"]) !!}
							</div>

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
    <div class="row">
	<div class="col-md-3 pull-right">
		{!! Html::link(route('user.create'), 'Crear', array('class' => 'btn btn-info btn-md pull-right')) !!}
       </div>
</div>
@endsection