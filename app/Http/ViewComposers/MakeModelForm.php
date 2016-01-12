<?php namespace JLcourier\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Request;

class MakeModelForm  {
    
		public function compose(View $view){
        
        
            //$makeForm =Request::only('cliente_id', 'contacto_id', 'cantidad[]');
            
            $clientes = \JLcourier\Entities\Cliente::orderBy('nombre', 'ASC')->lists('nombre', 'id');
            
            //$cliente = $contactos = array();
            
        //if($makeForm['cliente_id'] != null){
        
        //$cliente = \JLcourier\Entities\Cliente::find($makeForm['cliente_id']);
        //$contactos = \JLcourier\Entities\Contacto::where('cliente_id', $makeForm['cliente_id'])->orderBy('contacto', 'ASC')->lists('contacto', 'id');
        
        //}  
         
            $view->with(compact('clientes'));
            
        }
    
}
