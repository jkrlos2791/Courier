<?php namespace JLcourier\Entities;

use Illuminate\Database\Eloquent\Model;

class DetalleCotizacion extends Entity {

	
    public function cotizacion()
    {
    
       return $this->belongsTo(Cotizacion::getClass());
    
    }
    

}
