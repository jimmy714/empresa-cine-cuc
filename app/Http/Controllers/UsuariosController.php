<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function index(){

        //para realizar login
        return view('login');
    }

    public function create(){
        
        //para registrar un usuario
        return view('new_user');
    }

    public function show(){
        
        //para registrar un usuario
        return view('user_panel');
    }



}
