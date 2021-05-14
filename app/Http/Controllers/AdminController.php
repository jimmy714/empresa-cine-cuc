<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){

        //para visualizar los tickets comprados
        return view('admin_panel');
    }
    
    public function tickets(){

        //para visualizar los tickets comprados
        return view('admin_tickets');
    }

    public function movies(){
        
        //para añadir o quitar una pelicula
        return view('admin_movies');
    }

    public function showtimes(){
        
        //para añadir o quitar una función
        return view('admin_showtimes');
    }
}
