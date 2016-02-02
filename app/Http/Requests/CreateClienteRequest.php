<?php namespace JLcourier\Http\Requests;

use JLcourier\Http\Requests\Request;

class CreateClienteRequest extends Request {

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
            "nombre" => "required|min:3|max:45",
            "direccion" => "required|min:5|max:70",
            "ruc" => "required |min:11|max:11|unique:clientes,ruc"
		];
	}

}
