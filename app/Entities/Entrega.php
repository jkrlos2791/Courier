<?php namespace JLcourier\Entities;

class Entrega extends Entity {

	public function ordenServicio()
    {
    
        return $this->belongsTo(OrdenServicio::getClass());
    
    }
    
    public function items()
    {
    
        return $this->hasMany(ItemEntrega::getClass());
    
    }

}
