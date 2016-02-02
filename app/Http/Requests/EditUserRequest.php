<?php namespace JLcourier\Http\Requests;
use JLcourier\Http\Requests\Request;
use Illuminate\Routing\Route;

class EditUserRequest extends Request {

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
			"name" => "required|min:3|max:45",
            "email" => "required|email|unique:users,email," . $this->route->getParameter('user'),
		];
	}
    

}
