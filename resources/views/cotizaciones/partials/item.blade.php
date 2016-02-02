 <tr> 
     
                    <td class="no">{{ $nro1=$nro1+1 }}</td>
                     <td class="desc">{{ $detalle->descripcion }}</td>
                     <td class="desc">{{ $detalle->cantidad }}</td>
                      <td class="desc">{{ $detalle->peso }}</td>
                    <td class="desc">{{ $detalle->largo }}</td>
                    <td class="desc">{{ $detalle->ancho }}</td>
                    <td class="desc">{{ $detalle->alto }}</td>
                     <td class="desc">{{ $detalle->partida }}</td>
                      <td class="desc">{{ $detalle->llegada }}</td>
                    <td class="total">S/ {{number_format( $detalle->monto_total,2) }}</td>
                        
     
</tr>


             