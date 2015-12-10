 <tr>
     
    <td width="500"><p class="date-t"><span class="glyphicon glyphicon-time"></span> 
                        {{ $orden->fecha_inicio->format('d/m/Y') }}
                    </p></td>
     <td width="500">{{ $orden->nro_orden }}</td>
     <td width="500">{{ $orden->tipo }}</td>
     <td width="500">{{ $orden->tiempo }}</td>
    <td width="500">{{ $orden->cliente->nombre }}</td>
    <td width="500">
    {{ $orden->entregas()->count() }} entregas
     </td> 
    <td width="500">{{ $orden->estado }}</td>
     <td width="500"><a class="btn btn-primary" href="{{ route('ordenes.detalle', $orden) }}">
                            <span class="comments-count">
                                Detalle
                            </span>
                        </a></td>
     
</tr>
               