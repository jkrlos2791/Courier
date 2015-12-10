<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Shangel by JL Smart Solutions</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {!! Html::style('/assets/css/default.css') !!}
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
      <div class="container-fluid display-table">
      <div class="row display-table-row">
          <!-- side menu -->
          <div class="col-md-2 display-table-cell valign-top" id="side-menu">
          <h1>JL Courier</h1>
          <ul>
              <li class="link active">
              <a href="#">
                  <span class="glyphicon glyphicon-th" aria-hidden="true">
                  
                  </span>
                  <span>Dashboard</span>
                  </a>
              </li>
              <li class="link">
              <a href="#collapse-orden" data-toggle="collapse" aria-controls="colapse-orden">
                  <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                  <span>Ordenes</span>
                  {{-- <span class="label label-success pull-right">20</span> --}}
                  </a>
                  <ul class="collapse collapseable" id="collapse-orden">
                      <li><a href="{{ url('/') }}">Ver Ordenes</a></li>
                      <li><a href="{{ url('/ordenes_proceso') }}">En proceso
                          <li><a href="#">Nueva Orden</a></li>
                          {{-- <span class="label label-warning pull-right">{{ Auth::user()->name }}</span></a></li> --}}
                      <li><a href="{{ url('/exportar_ordenes') }}">Exportar Ordenes</a></li>
                  </ul>
              </li>
                         <li class="link">
              <a href="#collapse-cliente" data-toggle="collapse" aria-controls="colapse-cliente">
                  <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                  <span>Clientes</span>
                  </a>
                  <ul class="collapse collapseable" id="collapse-cliente">
                      <li><a href="{{ url('/cliente') }}">Ver Clientes</a></li>
                      <li><a href="{{ url('/cliente/create') }}">Nuevo Cliente</a></li>
                      <li><a href="{{ url('/exportar_clientes') }}">Exportar Clientes</a></li>
                  </ul>
              </li>
               <li class="link">
              <a href="#collapse-usuario" data-toggle="collapse" aria-controls="colapse-usuario">
                  <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                  <span>Usuarios</span>
                  </a>
                  <ul class="collapse collapseable" id="collapse-usuario">
                      <li><a href="{{ url('/user') }}">Ver Usuarios</a></li>
                      <li><a href="{{ url('/user/create') }}">Nuevo Usuario</a></li>
                      {{-- <li><a href="{{ url('/exportar_clientes') }}">Exportar Usuarios</a></li> --}}
                  </ul>
              </li>
               {{--<li class="link">
              <a href="commenters.html">
                  <span class="glyphicon glyphicon-pencil" aria-hidden="true">
                   </span>
                  <span>Commenters</span>
                  </a>
              </li>
                 <li class="link">
              <a href="tags.html">
                  <span class="glyphicon glyphicon-tags" aria-hidden="true">
                   </span>
                  <span>Tags</span>
                  </a>
              </li>
                 <li class="link settings-btn">
              <a href="settings.html">
                  <span class="glyphicon glyphicon-cog" aria-hidden="true">
                   </span>
                  <span>Settings</span>
                  </a>
              </li>--}}
               </ul>    
          </div>
          <!-- main content area -->
          <div class="col-md-10 display-table-cell valign-top">
<div class="row">
    <header id="nav-header" class="clearfix">
    <div class="col-md-5">
        {{--<input type="text" id="header-search-field" placeholder="Search for something...">--}}
        </div>
        <div class="col-md-7">
        <ul class="pull-right">
            <li id="welcome">Hola, {{ Auth::user()->name }}</li>
            {{--<li class="fixed-width">
            <a href="#">
                <span class="glyphicon glyphicon-bell" aria-hidden="true"></span>
                <span class="label label-warning">3</span>
                </a>
            </li>
            <li>
            <a href="#">
                <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                <span class="label label-message">3</span>
                </a>
            </li>--}}
            <li>
            <a href="{{ url('/auth/logout') }}" class="logout">
                <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
             log out
                </a>
            </li>
            </ul>
        </div>
    </header>
              </div>
              <div class="row">
              @yield('content')
              </div>
              <div class="row">
              <footer id="admin-footer" class="clearfix">
                  <div class="pull-left"><b>Shangel Perú SAC Copyright </b>&copy; 2015 by JL Smart Solutions</div>
                  <div class="pull-right">admin system</div>
                  </footer>
              </div>
          </div>
          </div>
      </div>
<!-- Scripts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script>
$(function () {
			    var scntDiv = $('#dynamicDiv');
			    $(document).on('click', '#addInput', function () {
			        $('<tr>'+
                        '<td><input class="form-control" type="text" id="inputeste" size="20" value="" placeholder="" name="contacto[]" /></td> '+
		        		'<td><input class="form-control" type="text" id="inputeste" size="20" value="" placeholder="" name="fijo[]" /> </td>'+
                        '<td><input class="form-control" type="text" id="inputeste" size="20" value="" placeholder="" name="celular[]" /></td> '+
		        		'<td><a class="btn btn-danger" href="javascript:void(0)" id="remInput">'+
							'<span class="glyphicon glyphicon-minus" aria-hidden="true"></span> '+
		        		'</a></td>'+
					'</tr>').appendTo(scntDiv);
			        return false;
			    });
			    $(document).on('click', '#remInput', function () {
		            $(this).parents('tr').remove();
			        return false;
			    });
			});
    </script>      
  </body>
</html>