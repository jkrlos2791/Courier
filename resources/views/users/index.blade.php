@extends('menu')
 
@section('content')
<div class="container">
	<div class="row">
             <div class="col-md-2">
            <h3>Usuarios</h3>
            <div class="form-group">
                
             
                
            </div>
             <div class="form-group">
		     <a class="btn btn-primary" href="#">Nuevo</a>
                </div>
       </div>
                    <div class="col-md-10">
	@if (Session::has('message'))
	        <div class="alert alert-success">{{ Session::get('message') }}</div>
	@endif 

      @if(!$users->isEmpty())
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
                      {!! Html::link(route('user.edit', $user->id), 'Editar', array('class' => 'btn btn-warning')) !!}
                    </td>
                    <td width="60" align="center">
                      {!! Form::open(array('route' => array('user.destroy', $user->id), 'method' => 'DELETE')) !!}
                          <button type="submit" class="btn btn-danger">Eliminar</button>
                      {!! Form::close() !!}
                    </td>
                  </tr>
              @endforeach
          </table>
          <?php echo $users->render(); ?>
      @endif
		</div>
	</div>
@endsection