<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Shangel Perú</title>
     {!! Html::style('assets/css/pdf.css') !!}
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="{{asset('assets/img/shangel_logo.jpg')}}">
      </div>
      <div id="company">
        <h2 class="name">Operadores Logísticos Shangel Perú S.A.C.</h2>
        <div>Calle Intisuyo 266, San Miguel</div>
        <div>20600193369</div>
        <div>(01) 452-8744 | anexo 103</div>
        <div><a href="mailto:courier@shangelperu.com.pe">courier@shangelperu.com.pe</a></div>
      </div>
      </div>
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">ORDEN DE SERVICIO PARA:</div>
          <h2 class="name">{{ $orden->cliente->nombre }}</h2>
          <div class="address">{{ $orden->cliente->direccion }}</div>
          <div class="ruc">{{ $orden->cliente->ruc }}</div>
          <div class="address">Punto de recojo: {{ $orden->punto_recojo }}</div>
          <div class="address">Dirección de recojo: {{ $orden->direccion_recojo }}</div>
        </div>
        <div id="invoice">
          <h1>N° DE ORDEN {{ $orden->nro_orden }}</h1>
          <div class="date">Fecha: {{ $orden->fecha_inicio }}</div>
          <div class="date">Fecha: {{ $orden->fecha_inicio }}</div>
          <div class="date">Tipo de servicio: {{ $orden->tipo }}</div>
          <div class="date">Tiempo de servicio: {{ $orden->tiempo }}</div> 
        </div>
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="unit">#</th>  
            <th class="desc">CANTIDAD</th>
            <th class="desc">PESO</th>
            <th class="desc">ENVIO</th>
            <th class="desc">DESCRIPCION</th>
            <th class="desc">DESTINO</th>
            <th class="desc">DIRECCION</th>
            <th class="desc">CLIENTE</th>
          </tr>
        </thead>
        <tbody> 
        @foreach ($orden->entregas as $entrega)
        @foreach ($entrega->items as $item)
          <tr>
            <td class="unit">{{ $nro=$nro+1 }}</td>
            <td class="desc">{{ $item->cantidad }}</td>
            <td class="desc">{{ $item->peso }}</td>
            <td class="desc">{{ $item->envio }}</td>
            <td class="desc">{{ $item->descripcion }}</td>  
            <td class="desc">{{ $entrega->destino }}</td> 
            <td class="desc">{{ $entrega->direccion_destino }}</td> 
            <td class="desc">{{ $entrega->cliente_final }}</td> 
            </tr>
        @endforeach 
        @endforeach 
        </tbody>
      </table>
      {{--<div id="thanks">Gracias!</div>--}}
      <div id="notices">
        <div>AVISO:</div>
        <div class="notice">Un cargo financiero del 1,5 % se realizará sobre los saldos pendientes de pago después de 30 días .</div>
      </div>
    </main>
  </body>
</html>