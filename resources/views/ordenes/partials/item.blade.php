 <tr>
    <td width="200">{{ $orden->nro_orden }}</td>
    <td width="300">
              {{ $orden->fecha_inicio }}
    </td>
     <td width="700">{{ $orden->cliente->nombre }}</td>
     <td width="200">{{ $orden->tipo }}</td>
     <td width="200">{{ $orden->tiempo }}</td>
     <td width="150">
         @include('ordenes/partials/status', compact('orden'))
    </td>
     <td><a class="btn btn-primary" href="{{ route('orden.generar', $orden) }}">
                            <span class="glyphicon glyphicon-file">
                            </span>
                        </a></td>
     <td><a class="btn btn-primary" href="{{ route('ordenes.detalle', $orden) }}">
                            <span class="glyphicon glyphicon-list-alt">
                            </span>
                        </a></td>
      <td><a class="btn btn-primary" href="{{ route('ordenes.edit', $orden) }}">
                            <span class="glyphicon glyphicon-pencil">
                            </span>
                        </a></td>
      <td>
                      {!! Form::open(array('route' => array('orden.destroy', $orden->id), 'method' => 'DELETE')) !!}
                          <button type="submit" class="btn btn-default">
                              <span class="glyphicon glyphicon-trash">
                            </span></button>
                      {!! Form::close() !!}
                    </td>
</tr>
               