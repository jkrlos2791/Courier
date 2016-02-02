<?php namespace JLcourier\Http\Requests;
use JLcourier\Http\Requests\Request;
use Illuminate\Routing\Route;

class EditOrdenRequest extends Request {

	public function __construct(Route $route)
    {
      $this->route = $route;
    }
    
    /**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
            "nro_orden" => "required|unique:orden_servicios,nro_orden," . $this->route->getParameter('id'),
            "fecha_inicio" => "required|before:2016-12-31|after:2015-12-31". $this->route->getParameter('id'),
            "cliente_id" => "required|not_in:0"
		];
	}

}
