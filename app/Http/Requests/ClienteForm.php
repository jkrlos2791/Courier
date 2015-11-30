<?php namespace JLcourier\Http\Requests;

use JLcourier\Http\Requests\Request;

class ClienteForm extends Request {

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
			"ruc" => "required |min:11|max:11"
		];
	}
	public function messages()
	{
		return [
			'ruc.required' => 'El campo nombre es requerido.',
			'ruc.min' => 'El nombre no puede tener menos de 11 caracteres.',
			'ruc.max' => 'El nombre no puede tener mas de 11 caracteres.',
		];
	}

}
