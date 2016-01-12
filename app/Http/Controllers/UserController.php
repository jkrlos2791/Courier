<?php namespace JLcourier\Http\Controllers;

use JLcourier\Http\Requests\UserForm;
use JLcourier\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;

class UserController extends Controller {

	use AuthenticatesAndRegistersUsers;
    
    public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;
	}
    
    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return view("users.index")->with('users', \JLcourier\Entities\User::paginate(10)->setPath('user'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		 return view("users.create");
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
    public function store(UserForm $userForm)
    {
    $user = new \JLcourier\Entities\User;
 
	$user->name = \Request::input('name');
        
    $user->email = \Request::input('email');
        
    $user->password = \Request::input('password');
 
	$user->save();
 
	return redirect('user/create')->with('message', 'User saved');
    }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
  public function edit($id)
    {
        return view('users.update')->with('user', \JLcourier\Entities\User::find($id));
    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
    public function update(UserForm $userForm, $id)
    {
        
    $user = \JLcourier\Entities\User::find($id);
 
	$user->name = \Request::input('name');
 
	$user->email = \Request::input('email');
    
	$user->save();
 
	return redirect()->route('user.edit', ['user' => $id])->with('message', 'El usuario ha sido actualizado.');
        
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		  $user = \JLcourier\Entities\User::find($id);
 
	$user->delete();
 
	return redirect()->route('user.index')->with('message', 'User deleted');
	}
    
	public function postRegister(Request $request)
	{
		$validator = $this->registrar->validator($request->all());

		if ($validator->fails())
		{
			$this->throwValidationException(
				$request, $validator
			);
		}

		$this->registrar->create($request->all());

		 return view("users.index")->with('users', \JLcourier\Entities\User::paginate(10)->setPath('user'));
	}

}
