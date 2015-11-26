<?php namespace JLcourier\Http\Controllers;

use JLcourier\Http\Requests\UserForm;
use JLcourier\Http\Controllers\Controller;

use Illuminate\Http\Request;

class UserController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
        return view("users.index")->with('users', \JLcourier\Entities\User::name($request->get('name'))->paginate(8)->setPath('user'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		 return view("users.createUpdate");
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
        return view('users.createUpdate')->with('user', \JLcourier\Entities\User::find($id));
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
    
    $user->password = \Request::input('password');
 
	$user->save();
 
	return redirect()->route('user.edit', ['user' => $id])->with('message', 'User updated');
        
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

}
