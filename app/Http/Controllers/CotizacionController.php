<?php namespace JLcourier\Http\Controllers;

use JLcourier\Entities\Cotizacion;

use JLcourier\Http\Requests;

use JLcourier\Http\Controllers\Controller;

use JLcourier\Http\Requests\CotizacionForm;

use Carbon\Carbon;

use DB;
    
use Request;  

class CotizacionController extends Controller {


    public function create()
    {
        $fecha = Carbon::now();
        
        $cotizacion_id = 1 + DB::table('cotizacions')->max('nro_cotizacion');;

        return view('cotizaciones.create', compact('fecha', 'cotizacion_id'));
    }
    
    public function store(CotizacionForm $cotizacionForm)
    {
          {
        
         $cotizacion = new \JLcourier\Entities\Cotizacion;
              
         $cotizacion->cliente_id = \Request::input('cliente_id');
         
         $cotizacion->contacto_id = \Request::input('contacto_id');
              
         $cotizacion->nro_cotizacion = \Request::input('nro_cotizacion');
              
        $cotizacion->servicio = \Request::input('servicio');
              
       $cotizacion->fecha_cotizacion = \Request::input('fecha_cotizacion'); 
        
        $cotizacion->pago = \Request::input('pago');
         
        $cotizacion->moneda = \Request::input('moneda');
              
         $cotizacion->save();
         
         foreach (Request::get('cantidad') as $key => $val) 
    {
        
        $detalle = new \JLcourier\Entities\DetalleCotizacion;
        $detalle->cantidad = \Request::input("cantidad.$key");
        $detalle->peso = \Request::input("peso.$key");
        $detalle->largo = \Request::input("largo.$key");
        $detalle->ancho = \Request::input("ancho.$key");
        $detalle->alto = \Request::input("alto.$key");
        $detalle->descripcion = \Request::input("descripcion.$key");
        $detalle->partida = \Request::input("partida.$key");
        $detalle->llegada = \Request::input("llegada.$key");
        $detalle->costo_peso = \Request::input("costo_peso");
        $detalle->costo_volumen = \Request::input("costo_volumen"); 
        $monto_volumen= \Request::input("alto.$key")* \Request::input("largo.$key")* \Request::input("ancho.$key") * \Request::input("costo_volumen") ;    
        $monto_peso= \Request::input("peso.$key") * \Request::input("cantidad.$key") * \Request::input("costo_peso")+ 10;
        if($monto_volumen < $monto_peso){
        $detalle->monto_total=$monto_peso;
        }else{
            $detalle->monto_total=$monto_volumen;
        }
        $detalle = $cotizacion->detallesCotizaciones()->save($detalle);         
    } 
      
      foreach (Request::get('adicional') as $key => $val) 
    {   
        
        $adicional = new \JLcourier\Entities\AdicionalCotizacion;
        $adicional->adicional = \Request::input("adicional.$key");
        $adicional->monto = \Request::input("monto.$key");
        $adicional = $cotizacion->adicionalesCotizaciones()->save($adicional);
    }              
              
        $subtotal1 = DB::table('detalle_cotizacions')->where('cotizacion_id', '=', $cotizacion->id)->sum('monto_total');
        $subtotal2 = DB::table('adicional_cotizacions')->where('cotizacion_id', '=', $cotizacion->id)->sum('monto');               
        $total=$subtotal1+$subtotal2;
        $cotizacion->subtotal1=$subtotal1;
        $cotizacion->subtotal2=$subtotal2;
        $cotizacion->total=$total;
        $cotizacion->save();
              $nro1=0;
              $nro2=0;
         return view("cotizaciones.resultado", compact('cotizacion','nro1','nro2')); 
    }
        
    }
    
    public function ultimas()
    {
        $cotizaciones = Cotizacion::orderBy('nro_cotizacion', 'DESC')->paginate(20);
        
        return view('cotizaciones/list', compact('cotizaciones'));
    }
    
    public function convencional()
    {
        $cotizaciones = Cotizacion::where('servicio', '=', 'convencional')->orderBy('nro_cotizacion', 'DESC')->paginate(20);
        
        return view('cotizaciones/list', compact('cotizaciones'));
    }
    
    public function express()
    {
        $cotizaciones = Cotizacion::where('servicio', '=', 'express')->orderBy('nro_cotizacion', 'DESC')->paginate(20);
        
        return view('cotizaciones/list', compact('cotizaciones'));
    }
    
    public function detalle($id)
    {
        $nro1=0;
        $nro2=0;
        $cotizacion = Cotizacion::findOrFail($id);
                
        return view('cotizaciones/mostrar', compact('cotizacion','nro1', 'nro2'));
    }
    public function pdf($id)
    {
        $nro1=0;
        $nro2=0;
        $cotizacion = Cotizacion::findOrFail($id);
        $view = \View::make('cotizaciones.pdf',compact('cotizacion','nro1', 'nro2','pdf'))->render();
        $pdf = \App::make('snappy.pdf.wrapper');
        $pdf->loadHTML($view)->setPaper('a4');
        $pdf->setOption('footer-center',('Pagina [page] de [topage] - Calle Intisuyo Nª 266 Maranga San Miguel
        www.shangelperu.com '.date('\ d/m/Y\ ')));
         $pdf->setOption('footer-line', true);
        return $pdf->stream( "Nº_Cotizacion_$cotizacion->nro_cotizacion.pdf");
       
 
    }
    public function guardar($id)
    {

        $cotizacion -> estado=2;
       $cotizacion->save($id);
        return view("cotizaciones.resultado", compact('cotizacion')); 
    }

}
