<?php namespace JLcourier\Entities;

class Cliente extends Entity {

	protected $fillable = ['id', 'nombre', 'direccion', 'ruc', 'banco'];
    
    public function ordenes()
    {
    
        return $this->hasMany(OrdenServicio::getClass());
    
    }
    
    public function contactos()
    {
    
        return $this->hasMany(Contacto::getClass());
    
    }

}
