<?php namespace JLcourier\Entities;

class Entrega extends Entity {

	public function ordenServicio()
    {
    
        return $this->belongsTo(OrdenServicio::getClass());
    
    }

}
