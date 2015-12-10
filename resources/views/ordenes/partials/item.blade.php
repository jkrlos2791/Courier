 <tr>
     
    <td width="500">
              {{ $orden->fecha_inicio->format('d/m/Y') }}
    </td>
     <td width="500">{{ $orden->nro_orden }}</td>
     <td width="500">{{ $orden->cliente->nombre }}</td>
     <td width="500">{{ $orden->tipo }}</td>
     <td width="500">{{ $orden->tiempo }}</td>
    <td width="500">
    {{ $orden->entregas()->count() }} entregas
     </td> 
     <td width="500">
         @include('ordenes/partials/status', compact('orden'))
    </td>
     <td width="500"><a class="btn btn-primary" href="{{ route('ordenes.detalle', $orden) }}">
                            <span class="comments-count">
                                Detalle
                            </span>
                        </a></td>
     
</tr>
               