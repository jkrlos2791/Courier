<?php namespace JLcourier\Entities;

class Contacto extends Entity {

	  public function cliente()
    {
    
        return $this->belongsTo(Cliente::getClass());
    
    } 

}
