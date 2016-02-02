@extends('layout2')
@section('content')
<div class="container">
	<div class="row">
        <div class="col-md-10 col-md-offset-1">
    <div class="row">
                    <div class="col-md-12">
                        <h3>
                    Usuarios
                </h3>
                        

{!! Html::nav(config('usuarionav.tabs')) !!}
                        
  <br/>                      
	@if (Session::has('message'))
	        <div class="alert alert-success">{{ Session::get('message') }}</div>
	@endif 
      @if(!$users->isEmpty())
                         <?php echo $users->render(); ?> 
          <table class="table table-hover">
              <tr>
                 <th>Nombre</th>
                 <th>Email</th>
                 <th colspan="2">Acciones</th>
              </tr>
              @foreach ($users as $user)
                  <tr>
                    <td width="500">{{ $user->name }}</td>
                      <td width="500">{{ $user->email }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('user.edit', $user) }}">
                            <span class="glyphicon glyphicon-pencil">
                            </span>
                        </a>
                    </td>
                    <td>
                      {!! Form::open(array('route' => array('user.destroy', $user->id), 'method' => 'DELETE')) !!} 
                          <button type="submit" class="btn btn-default">
                              <span class="glyphicon glyphicon-trash">
                            </span></button>
                      {!! Form::close() !!}
                    </td> 
                  </tr>
              @endforeach
          </table>
          <?php echo $users->render(); ?>
      @endif
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