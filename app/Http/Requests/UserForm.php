<?php namespace JLcourier\Http\Requests;

use JLcourier\Http\Requests\Request;

class UserForm extends Request {

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
			"name" => "required|min:3|max:45",
            "email" => "required|email|unique:users"
		];
	}
    
    public function messages()
	{
	    return [
            
	        'name.required' => 'El campo nombre es requerido.',
	        'name.min' => 'El campo nombre no puede tener menos de 3 carácteres.',
			'name.max' => 'El nombre nombre no puede tener más de 45 carácteres.',
            'email.required' => 'El campo email es requerido.',
            'email.email' => 'El campo email debe cumplir el siguiente formato: nombre@dominio.com',
            'email.unique' => 'El campo email ya ha sido registrado.',
	    
        ];
	}

}
