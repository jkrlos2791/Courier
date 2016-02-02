<?php namespace JLcourier\Http\Requests;

use JLcourier\Http\Requests\Request;

class CreateOrdenRequest extends Request {

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
            "fecha_inicio" => "required|after:2015-12-31|before:2016-12-31",
            "cliente_id" => "required|not_in:0"
		];
	}

}
