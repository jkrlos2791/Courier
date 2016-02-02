<?php namespace JLcourier\Http\Controllers;
use JLcourier\Http\Requests\CreateUserRequest;
use JLcourier\Http\Requests\EditUserRequest;
use JLcourier\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller {

    use AuthenticatesAndRegistersUsers;
    
    public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;
	}
    
	public function index()
	{
        return view("users.index")->with('users', \JLcourier\Entities\User::paginate(10)->setPath('user'));
	}
    
    public function administrador()
	{
        return view("users.index")->with('users', \JLcourier\Entities\User::where('type', '=', 'admin')->paginate(10)->setPath('user'));
	}
    
    public function operativo()
	{
        return view("users.index")->with('users', \JLcourier\Entities\User::where('type', '=', 'opera')->paginate(10)->setPath('user'));
	}

	public function create()
	{
		 return view("users.create");
	}

    public function store(CreateUserRequest $request)
    {
    }

	public function show($id)
	{
	}
    
    public function edit($id)
    {
        return view('users.update')->with('user', \JLcourier\Entities\User::find($id));
    }

    public function update(EditUserRequest $request, $id)
    {  
    $user = \JLcourier\Entities\User::find($id);
	$user->name = \Request::input('name');
	$user->email = \Request::input('email');
	$user->save();
	return redirect()->route('user.edit', ['user' => $id])->with('message', 'El usuario ha sido actualizado.');        
    }

	public function destroy($id)
	{
    $user = \JLcourier\Entities\User::find($id);
	$user->delete();
	return redirect()->route('user.index')->with('message', 'El usuario ha sido eliminado.');
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
        return redirect()->route('user.create')->with('message', 'El usuario ha sido registrado.');
	}
    
    public function exportar()
	{
     Excel::create('Usuarios', function($excel) {
     $excel->sheet('Usuarios', function($sheet) {
     $usuarios = \JLcourier\Entities\User::all();
     $sheet->fromArray($usuarios); 
     });
     })->export('xls');
	}

}