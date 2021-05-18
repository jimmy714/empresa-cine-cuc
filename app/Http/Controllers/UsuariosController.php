<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUsuario;
use App\Models\Usuario;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use PhpParser\Node\Stmt\TryCatch;

class UsuariosController extends Controller
{
    
    public function index(){

        //para realizar login
        return view('login');
    }

    public function validarlogin(Request $loginRequest){

        $validated=$loginRequest->validate([
            'emailOrUsuario' => 'required|string',
            'password' => 'required|string',
        ]);

        /*aquí verificamos si se ingresó un correo o un nombre de usuario
        Simplmente buscamos si existe un email asociado a al valor ingresado como si fuera un usuario_nickname

        Si la búsqueda da null continuamos el login con el valor ingresado como email, sino se intenta con
        el correo intentado

        */

        if($validated)
        {
            $loginRequestAlter=$loginRequest;
            $emailOrNickname= DB::table('usuarios')->where('usuario_nickname',$loginRequest->emailOrUsuario)->value('email');
            
            if ($emailOrNickname!=null)
            {  
                //Se ingresó un Usuario nickname
                $loginRequestAlter['email']=$emailOrNickname;
            }
            else
            {
                //Se ingresó un email
                $loginRequestAlter['email']=$loginRequest->emailOrUsuario;
            }
                      
            $credentials=$loginRequestAlter->only('email','password');
            
            
            if(Auth::attempt($credentials))
            {
                $loginRequest->session()->regenerate();

                $hora_signin=Usuario::find(Auth::user()->id_usuario);
                $hora_signin->hora_ultimo_login=Carbon::now()->toDateTimeString();
                $hora_signin->save();

                return redirect()
                ->intended('/user_panel')
                ->with('status', 'Haz iniciado sesión satisfactoriamente');
            }
            throw ValidationException::withMessages([
                'email'=>'Email o usuario no se encuentra registrado',
                'password'=>'Contraseña incorrecta'
            ]);
            
            
        }
        else
        
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

   
    /*

            Request App\Models\Usuario
    */
    public function store(StoreUsuario $request)
    {
        
        
        $verificar=Usuario::where('email',$request->email)->first();
        
        if($verificar!=null)
        {
            return redirect()->back()->with('error', 'Email en uso');
        }
        else
        {
            $verificar=Usuario::where('usuario_nickname',$request->usuario_nickname)->first();
            if($verificar!=null)
            {
                return redirect()->back()->with('error', 'Nombre de usuario en uso');
            }
            else
            {
                $verificar=Usuario::where('num_identificacion',$request->num_identificacion)->first();
                if($verificar!=null)
                {
                    return redirect()->back()->with('error', 'Número de identificacion de usuario en uso');
                }
            }
        }

        $new_register= new Usuario();
        $new_register->usuario_nickname=$request->usuario_nickname;
        $new_register->nombre=$request->nombre;
        $new_register->apellido=$request->apellido;
        $new_register->num_identificacion=$request->num_identificacion;
        $new_register->email=$request->email;
        $new_register->celular=$request->celular;
        $new_register->password=Hash::make($request->password);
        $new_register->save();


        return(redirect('/')->with('status','Usuario registrado satisfactoriamente, ya puedes iniciar sesión'));

        
        



        //return($edsd);
        
        //return('Hola');
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


}
