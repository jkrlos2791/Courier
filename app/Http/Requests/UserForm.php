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
			"name" => "required|min:5|max:45" 
		];
	}
    
    public function messages()
	{
	    return [
            
	        'name.required' => 'El campo nombre es requerido!',
	        'name.min' => 'El nombre title no puede tener menos de 5 carácteres',
			'name.max' => 'El nombre title no puede tener más de 45 carácteres',
	    
        ];
	}

}
