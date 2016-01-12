 <tr>
     
    <td width="200">
              {{ $orden->fecha_inicio->format('d/m/Y') }}
    </td>
     <td width="300">{{ $orden->nro_orden }}</td>
     <td width="700">{{ $orden->cliente->nombre }}</td>
     <td width="200">{{ $orden->tipo }}</td>
     <td width="200">{{ $orden->tiempo }}</td>
     <td width="150">
         @include('ordenes/partials/status', compact('orden'))
    </td>
     <td width="600"><a class="btn btn-primary" href="{{ route('ordenes.edit', $orden) }}">
                            <span class="glyphicon glyphicon-edit">
                                Editar
                            </span>
                        </a>&nbsp;<a class="btn btn-primary" href="{{ route('ordenes.detalle', $orden) }}">
                            <span class="glyphicon glyphicon-zoom-in">
                                Entregas
                            </span>
                        </a></td>
     
</tr>
               