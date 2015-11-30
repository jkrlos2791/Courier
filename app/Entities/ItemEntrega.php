<?php namespace JLcourier\Entities;

class ItemEntrega extends Entity {

	public function entrega()
    {
    
        return $this->belongsTo(Entrega::getClass());
    
    }

}
