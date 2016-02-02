<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Cotizacion</title>
      	
{!! Html::style('assets/css/pdf.css') !!}
    
  </head>
  <body>
      <header class="clearfix">
          
          
      <div id="logo">
        <img class="hidden-xs hidden-sm" border="0" height="49" width="179" src="{{asset('assets/img/shangel_logo.jpg')}}">
      </div>
      <div id="company">
        <h2 class="name">SHANGEL PERU</h2>
        <div>Calle Intisuyo 266 San Miguel </div>
        <div>(01) 452-8744</div>
        <div><a href="mailto:www.shangelperu.com.pe">www.shangelperu.com.pe</a></div>
      </div>
      </div>
    </header>
    
    <div id="details" class="clearfix">
        <div id="client">
          <div class="to">Señor(es): &nbsp;<h2 class="name"> {{ $cotizacion->cliente->nombre }}</h2></div>
          <div class="address">Ruc: &nbsp; {{ $cotizacion->cliente->ruc }}</div>
          <div class="address">Direccion: &nbsp; {{ $cotizacion->cliente->direccion }}</div>
          <div class="address">Contacto: &nbsp; {{ $cotizacion->contacto->contacto }}</div>
        </div>
        <div id="invoice">
          <h1> Nº. {{ $cotizacion->nro_cotizacion }}</h1>
          <div class="email">Tipo Servicio: &nbsp; {{ $cotizacion->servicio }} </div>
          <div class="date">Condiciones de Pago: {{ $cotizacion->pago }}</div>
          <div class="date">Fecha de Cotizacion: {{ ($cotizacion->fecha_cotizacion)}}</div>
        </div>
    </div>
    
    <h3 >1. Detalle Principal</h3>
   <table border="0" cellspacing="0" cellpadding="0">
        <thead>
             <tr>
                <th class="no">Nº</th>
                <th class="desc">DESCRIPCION</th>
				<th class="desc">CANTIDAD</th>
				<th class="desc">PESO UNID.</th>
                <th class="desc">PARTIDA</th>
				<th class="desc">LLEGADA</th>
				<th class="total">TOTAL</th>
            </tr>
           </thead> 
       <tbody>
                @foreach($cotizacion->detallesCotizaciones as $detalle)
                     <tr> 
     
                    <th class="no">{{ $nro2=$nro2+1 }}</th>
                     <th class="desc">{{ $detalle->descripcion }}</th>
                     <th class="desc">{{ $detalle->cantidad }}</th>
                      <th class="desc">{{ $detalle->peso }}</th>
                     <th class="desc">{{ $detalle->partida }}</th>
                      <th class="desc">{{ $detalle->llegada }}</th>
                    <th class="total">S/ {{number_format( $detalle->monto_total,2) }}</th>
                        
     
                    </tr>
                @endforeach
       </tbody>
       
       <tfoot>
          <tr>
            <td colspan="4"></td>
            <td colspan="2">SUBTOTAL</td>
            <td>S/ {{ number_format($cotizacion->subtotal1,2) }}</td>
          </tr>
       </tfoot>  
    </table>

    </br>
			<h3 >2. Detalle Adicional</h3>
         <table border="0" cellspacing="0" cellpadding="0">
             <thead>
              <tr>
                <th class="no" width="5">Nº</th>
                 <th class="desc" width="405">DESCRIPCION</th>
				<th class="total" width="55">TOTAL</th>
              </tr>
              </thead>  
             <tbody>
                @foreach($cotizacion->adicionalesCotizaciones as $adicional)
               <tr>
        <td class="no">{{ $nro1=$nro1+1 }}</td>
        <td class="desc">{{ $adicional->adicional }}</td>
        <td class="total">S/ {{number_format( $adicional->monto,2)}}</td>
                        
     
                 </tr>
                @endforeach
             </tbody>    
         <tfoot>
        
          <tr>
            <td ></td>
            <td >SUBTOTAL</td>
            <td>S/ {{ number_format($cotizacion->subtotal2,2) }}</td>
          </tr>

       </tfoot>     
        </table>
        
        </br>
<table>
        <tfoot>
              <tr>
                <td width="95%"><strong>TOTAL</strong></td>
                <td ><strong>S/ {{ number_format($cotizacion->total,2) }}</strong></td>
            </tr>
        </tfoot>


</table>
        
    <div id="thanks"><strong>Atendidos por: Genoveva Herrera Zumaeta </strong><br>
   <a href="mailto:shangelperu.com.pe">courier@shangelperu.com.pe</a></div>
      <div id="notices">
        <div>NOTA IMPORTANTE:</div>
        <div class="notice"> 
<p>Los costos no incluyen IGV.<br>
<UL type = disk >
    <LI>Mediante la firma de la presente orden, el cliente declara expresamente conocer, haber leído y aceptar los términos y condiciones contenidos en el documento.
    <LI>Pedido Mínimo para obtener descuento cotizado.
</ul>
</p>
</div>
      </div>


 
    
    
<div class="page"> 
            <div>
<h3 ><center>CONDICIONES GENERALES</center></h3>
   <p>1.	Los tiempos de espera de carga y descarga en el servicio de <negrita>“CARGA DIRECTA”</negrita> es de 4 horas como máximo de espera por cada servicio. (Entiéndase por esto 2 horas de carga y 2 horas de descarga). Cuando se cumplan estos tiempos el operador informara a la usuaria del servicio, el recargo del 10% del flete acordado por cada hora adicional  transcurrida. La empresa comunicara siempre al cliente la hora de llegada y salida de la unidad  de cada destino, y entregara un reporte del mismo una vez concluido el servicio, para su posterior facturación.</p> 
    <p>
    2.	Si habiendo transcurrido 4 horas y no se hiciera la carga de la unidad asignada para el servicio solicitado por el cliente, la empresa se comunicara automáticamente con el cliente para que autorice la permanencia de la unidad hasta la carga, cobrándose todos los recargos antes señalados o que se disponga el retorno a la base de operaciones para reasignación de servicio , en cuyo caso se cobrara un <negrita>“FALSO FLETE”</negrita> que será calculado porcentualmente de la base de tarifa ofrecida al cliente, que corresponderá al 50% del valor del servicio.
    
    </p>
    <p>
    3.	Todo cambio en los servicios solicitados serán previamente consultados con la empresa para la coordinación de los costos adicionales que esto originaria o logística necesaria para la toma de nuevos servicios por parte del cliente. Una vez aceptado los nuevos términos por el cliente se continuara con la labor de transporte y carga coordinada.
    </p>
    <p>
    4.	El servicio de transporte de carga directa y carga multipunto consisten en:
        <UL type = disk >
<LI>Servicio de transporte de carga hasta los puntos acordados.
<LI>Coordinación de entregas y llenado de guías de entrega de mercadería. (Multipunto).
<LI>Mantener unidad en estado óptimo estado para prestación del servicio.
<LI>Tener una unidad disponible en caso de cualquier imponderable poder sustituir la unidad y así completar el servicio de entrega de carga o la distribución multipunto.
<LI>Entrega de Reporte (Hora de llegada de salida tiempo de carga y descarga)
    </UL>
    </p>
    <p>
    5.	Los servicio de transporte de carga directa  y carga multipunto no incluyen:
    <UL type = disk >
<LI>Seguro contra robo de mercadería o pérdida por accidente vial.
<LI>Servicio de resguardo de carga. Esta característica de servicio si se incluye en el “CARGO SEGURO”
<LI>Servicio de Estiba y desestiba .Se cotiza como adicional a cada servicio.
        </UL>
    </p>
    <p>6.	Todas las tarifas no incluyen el Impuesto General a las Ventas (I.G.V.)</p>
    <p>7.	Los servicios ofrecidos son únicamente prestados al cliente que hace la confirmación del servicio, bajo ninguna excepción el cliente podrá contratar servicio de carga para una tercera persona de hacerlo así tendrá que firmar un documento adicional de responsabilidad por la carga que pueda transportar el tercero. 
    </p>
</div>
        <br><br><br><br><br><br><br>
    <table class="ultimo">
            <tr><p>
                <td><hr align="center" noshade="noshade" size="0.5" width="40%" />
                <center class="firma">Shangel Peru<br>&nbsp;</center>
                </td>  
                <td><hr align="center" noshade="noshade" size="0.5" width="40%" />
                <center class="firma">Conformidad del Cliente<br>(Sello y Firma)</center>
                </td>
                </p>
            </tr>
    </table>

</div>


    
  </body>
</html>




































