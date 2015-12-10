@extends('layout2')
@section('content')
<div class="container">
	<div class="row">
        <div class="col-md-10 col-md-offset-1">
    <div class="row">
                    <div class="col-md-12">
                        <h1>
                    Usuarios
                </h1>
	@if (Session::has('message'))
	        <div class="alert alert-success">{{ Session::get('message') }}</div>
	@endif 
      @if(!$users->isEmpty())
                         <?php echo $users->render(); ?> 
          <table class="table table-bordered">
              <tr>
                 <th>Nombre</th>
                 <th>Email</th>
                 <th colspan="2">Acciones</th>
              </tr>
              @foreach ($users as $user)
                  <tr>
                    <td width="500">{{ $user->name }}</td>
                      <td width="500">{{ $user->email }}</td>
                    <td width="60" align="center">
                      {!! Html::link(route('user.edit', $user->id), 'Editar', array('class' => 'btn btn-primary')) !!} 
                    </td>
                   {{--  <td width="60" align="center">
                      {!! Form::open(array('route' => array('user.destroy', $user->id), 'method' => 'DELETE')) !!} 
                          <button type="submit" class="btn btn-danger">Eliminar</button>
                      {!! Form::close() !!}
                    </td> --}}
                  </tr>
              @endforeach
          </table>
          <?php echo $users->render(); ?>
      @endif
				</div>
	</div>
            <hr>
            </div>
        </div>
</div>
@endsection