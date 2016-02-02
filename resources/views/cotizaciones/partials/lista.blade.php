 <tr>
     <td width="200">{{ $cotizacion->nro_cotizacion }}</td>
     <td width="300">{{ $cotizacion->fecha_cotizacion }}</td>
     <td width="500">{{ $cotizacion->cliente->nombre}}</td>
     <td width="500">{{ $cotizacion->contacto->contacto}}</td>
     <td width="500">{{ $cotizacion->servicio}}</td>
     <td width="500">S/ {{ $cotizacion->total}}</td>
     <td><a class="btn btn-primary" href="{{ route('cotizaciones.pdf', $cotizacion) }}">
                            <span class="glyphicon glyphicon-file">
                            </span>
                        </a></td>
     <td><a class="btn btn-primary" href="{{ route('cotizaciones.detalle', $cotizacion) }}">
                            <span class="glyphicon glyphicon-list-alt">
                            </span>
                        </a></td>
</tr>
             