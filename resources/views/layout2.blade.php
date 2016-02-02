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
          <div class="col-md-2 col-sm-1 hidden-xs display-table-cell valign-top" id="side-menu">      
         <img class="hidden-xs hidden-sm" border="0" height="49" width="179" src="{{asset('assets/img/shangel_logo.jpg')}}">
          <ul>
              <li class="link active">
              <a href="#">
                  <span class="glyphicon glyphicon-th" aria-hidden="true">
                  
                  </span>
                  <span class="hidden-sm hidden-xs">Dashboard</span>
                  </a>
              </li>
              <li class="link">
              <a href="#collapse-cotizacion" data-toggle="collapse" aria-controls="colapse-orden">
                  <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                  <span>Cotizaciones</span>
                  </a>
                  <ul class="collapse collapseable" id="collapse-cotizacion">
                      <li><a href="{{ url('/cotizaciones') }}">Ver Cotizaciones</a></li>
                      <li><a href="{{ url('/cotizacion/create') }}">Nueva Cotización</a></li>
                  </ul>
              </li>
              <li class="link">
              <a href="#collapse-orden" data-toggle="collapse" aria-controls="colapse-orden">
                  <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                  <span class="hidden-sm hidden-xs">Ordenes</span>
                  {{-- <span class="label label-success pull-right">20</span> --}}
                  </a>
                  <ul class="collapse collapseable" id="collapse-orden">
                      <li><a href="{{ url('/') }}">Ver Ordenes</a></li>
                      <li><a href="{{ route('ordenes.create') }}">Nueva Orden</a></li>
                      {{-- <li><a href="{{ url('/ordenes_proceso') }}">En proceso
                           <span class="label label-warning pull-right">{{ Auth::user()->name }}</span></a></li> --}}
                      <li><a href="{{ url('/exportar_ordenes') }}">Exportar Ordenes</a></li>
                  </ul>
              </li>
                         <li class="link">
              <a href="#collapse-cliente" data-toggle="collapse" aria-controls="colapse-cliente">
                  <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                  <span class="hidden-sm hidden-xs">Clientes</span>
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
                  <span class="hidden-sm hidden-xs">Usuarios</span>
                  </a>
                  <ul class="collapse collapseable" id="collapse-usuario">
                      <li><a href="{{ url('/user') }}">Ver Usuarios</a></li>
                      <li><a href="{{ url('/user/create') }}">Nuevo Usuario</a></li>
                      <li><a href="{{ url('/exportar_usuarios') }}">Exportar Usuarios</a></li>
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
          <div class="col-md-10 col-sm-11 display-table-cell valign-top">
<div class="row">
    <header id="nav-header" class="clearfix">
    <div class="col-md-5">
        <nav class="navbar-default pull-left">
        <button type="button" class="navbar-toggle collapsed" data-toggle="offcanvas" data-target="#side-menu" aria-expanded="false">
       <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
        </nav>
        {{--<input type="text" class="hidden-sm hidden-xs" id="header-search-field" placeholder="Search for something...">--}}
        </div>
        <div class="col-md-7">
        <ul class="pull-right">
            <li id="welcome" class="hidden-xs">Hola, {{ Auth::user()->name }}</li>
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
<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
<script type="text/javascript">
  //$('select').select2();
$(document).ready(function(){
    
        $('select').select2();
        
        $.fn.populateSelect = function(values){
            var options = '';
            $.each(values, function(key, row){
                options += '<option value="' + row.value + '">' + row.text + '</option>';     
            });
            $(this).html(options);
        }
     
        $('#cliente_id').change(function(){
           var cliente_id = $(this).val();
            if(cliente_id == ''){
               //$('#contacto_id').empty();
            }else{
               $.getJSON('/contactos/'+cliente_id, null, function(values){
                    $('#contacto_id').populateSelect(values);
               });
            }
        });
    });    
</script>      
<script>
$(function () {
			    var scntDiv = $('#dynamicDiv');
			    $(document).on('click', '#addInput', function () {
			        $('<tr>'+
                        '<td><input class="form-control" type="text" id="inputeste" size="20" value="" placeholder="Ejm: Juan Ramos" name="contacto[]" /></td> '+
		        		'<td><input class="form-control" type="text" id="inputeste" size="20" value="" placeholder="Ejm: 123-4567" name="fijo[]" /> </td>'+
                        '<td><input class="form-control" type="text" id="inputeste" size="20" value="" placeholder="Ejm: 987654321" name="celular[]" /></td> '+
		        		'<td><a class="btn btn-default" href="javascript:void(0)" id="remInput">'+
							'<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> '+
		        		'</a></td>'+
					'</tr>').appendTo(scntDiv);
			        return false;
			    });
			    $(document).on('click', '#remInput', function () {
		            $(this).parents('tr').remove();
			        return false;
			    });
			});
$(function () {
			    var scntDiv = $('#items');
			    $(document).on('click', '#addInput', function () {
			        $('<tr>'+
                        '<td><input class="form-control" type="text" id="inputeste" size="20" value="" placeholder="" name="cantidad[]" /></td> '+
		        		'<td><input class="form-control" type="text" id="inputeste" size="20" value="" placeholder="" name="peso[]" /> </td>'+
                        '<td><input class="form-control" type="text" id="inputeste" size="20" value="" placeholder="" name="envio[]" /></td> '+
                      '<td><input class="form-control" type="text" id="inputeste" size="20" value="" placeholder="" name="descripcion[]" /></td> '+
		        		'<td><a class="btn btn-default" href="javascript:void(0)" id="remInput">'+
							'<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> '+
		        		'</a></td>'+
					'</tr>').appendTo(scntDiv);
			        return false;
			    });
			    $(document).on('click', '#remInput', function () {
		            $(this).parents('tr').remove();
			        return false;
			    });
			}); 
   //////////////////////////////////////////////////////////// 
    $(function () {
			    var scntDiv = $('#detalleCotizacion');
			    $(document).on('click', '#addInput', function () {
			        $('<tr>'+
                        '<td class="col-md-1"><input class="form-control" type="text" placeholder="Und." name="cantidad[]" /></td>'+
		        		'<td class="col-md-1"><input class="form-control" type="text" placeholder="Kg." name="peso[]" /></td>'+
                        '<td class="col-md-1"><input class="form-control" type="text" placeholder="cm" name="largo[]" /></td>'+
                        '<td class="col-md-1"><input class="form-control" type="text" placeholder="cm" name="ancho[]" /></td>'+
                        '<td class="col-md-1"><input class="form-control" type="text" placeholder="cm" name="alto[]" /></td>'+
		        		'<td class="col-md-3"><input class="form-control" type="text" placeholder="descripcion" name="descripcion[]" /></td>'+
                        '<td class="col-md-2"><input class="form-control" type="text" placeholder="partida" name="partida[]" /></td>'+
                        '<td class="col-md-2"><input class="form-control" type="text" placeholder="llegada" name="llegada[]" /></td>'+
		        		'<td><a class="btn btn-default" href="javascript:void(0)" id="remInput">'+
				        '<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> '+
		        		'</a></td>'+
					'</tr>').appendTo(scntDiv);
			        return false;
			    });
			    $(document).on('click', '#remInput', function () {
		            $(this).parents('tr').remove();
			        return false;
			    });
			});
    $(function () {
			    var scntDiv = $('#costosAdicionales');
			    $(document).on('click', '#addInput2', function () {
			        $('<tr>'+
                        '<td class="col-md-10"><input class="form-control" type="text" placeholder="Descripcion del adicional" name="adicional[]" /></td>'+
		        		'<td><input class="form-control" type="text" placeholder="monto" name="monto[]" /></td>'+
		        		'<td><a class="btn btn-default" href="javascript:void(0)" id="remInput">'+
				        '<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> '+
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
{!! Html::script('/assets/js/default.js') !!}
  </body>
</html>