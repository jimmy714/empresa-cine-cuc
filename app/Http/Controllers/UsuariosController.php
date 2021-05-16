<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Psy\Command\WhereamiCommand;

class UsuariosController extends Controller
{
    
    public function index(){

        //para realizar login
        return view('login');
    }

    public function validarlogin(Request $loginRequest){

       $validated=$loginRequest->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        //return($loginRequest);
        
        if($validated)
        {
            $credentials=$loginRequest->only('email','password');
            if(Auth::attempt($credentials))
            {
                $loginRequest->session()->regenerate();
                return redirect()
                ->intended('/user_panel')
                ->with('status', 'Haz iniciado sesión satisfactoriamente');
            }
            throw ValidationException::withMessages([
                'email'=>'El correo no se encuentra registrado',
                'password'=>'Contraseña incorrecta'
            ]);
            
            
        }
        
        return (redirect('login'));
        
    }

    public function validarlogout(Request $request)
    {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
        
        
        return(redirect('/')->with('status','Haz cerrado sesion satisfactoriamente'));
    }


    public function create(){
        
        //para registrar un usuario
        return view('new_user');
    }

    public function show(){
        
        //Aqui va el panel de usario
        $id_usuario_actual=Auth::id();
        
        $datos_usuario = DB::table('usuarios')
        ->where('id_usuario',  $id_usuario_actual)
        ->get();

        //historial de tiquetes
        $historial_tiquetes=DB::table('tiquetes')
        ->where('id_usuario', $id_usuario_actual )
        ->get();
        
        
        return view('user_panel')->with('datos_usuario',$datos_usuario)->with('histotial_tiq',$historial_tiquetes);
        
    }

    public function store(Request $request)
    {
        return('Hola');
    }



}
