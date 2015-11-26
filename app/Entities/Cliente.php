<?php namespace JLcourier\Entities;

class Cliente extends Entity {

	public function ordenes()
    {
    
        return $this->hasMany(OrdenServicio::getClass());
    
    }

}
