<?php namespace JLcourier\Entities;

class Cotizacion extends Entity{

public function getDates()
    {
    return ['created_at', 'updated_at'];
    }
    
    public function detallesCotizaciones()
    {
    
        return $this->hasMany(DetalleCotizacion::getClass());
    
    }
    
    public function adicionalesCotizaciones()
    {
    
        return $this->hasMany(AdicionalCotizacion::getClass());
    
    }
    
    public function cliente()
    {
    
        return $this->belongsTo(Cliente::getClass());
    
    }
    
    public function contacto()
    {
    
        return $this->belongsTo(Contacto::getClass());
    
    }


}
