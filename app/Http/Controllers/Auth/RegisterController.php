<?php 
 
namespace Notaria\Http\Controllers\Auth;  
use Notaria\puestos;
use Notaria\User;
use Notaria\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller 
{
    /* 
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */ 

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void 
     */

    public function __construct()
    {
      // $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */ 
    protected function validator(array $data) 
    {
        return Validator::make($data, [
            'nombre' => 'required|string|max:255',
            'ap_paterno' => 'required|string|max:255',
            'ap_materno' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',

        ]);
    } 
 
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \Notaria\User
     */
    protected function create(array $data) 
    {
        $usuario = User::create([
            'nombre' => $data['nombre'], 
            'ap_paterno' => $data['ap_paterno'],
            'ap_materno' => $data['ap_materno'],
            'puesto_id' => $data['puesto'],
            'email' => $data['email'], 
            'estado' => $data['estado'], 
            'password' => Hash::make($data['password']),
           
      
        ]);

      /*  usuarios($usuario->puesto_id);
           dd($usuario->id)
            $usuarios = User::all();
            $puestos = puestos::all();

            return view('editar_usuario', compact('usuarios'));


*/





    }

   
}
