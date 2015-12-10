<?php namespace JLcourier\Entities;

class OrdenServicio extends Entity {
    
    protected $fillable = ['id', 'cliente_id', 'fecha_inicio', 'nro_orden', 'tipo', 'tiempo', 'estado'];
    
    public function getDates()
    {
    return ['created_at', 'fecha_inicio'];
    }
    
    public function entregas()
    {
    
        return $this->hasMany(Entrega::getClass());
    
    }
    
    public function cliente()
    {
    
        return $this->belongsTo(Cliente::getClass());
    
    } 

}
