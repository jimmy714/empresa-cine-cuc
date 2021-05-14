<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(){

        //Se deben cargar las peliculas disponibles

        $cartelera=DB::table('peliculas')
        ->get();

        return view('home')->with('cartelera',$cartelera);
    }

    public function ticket(Request $pelicula){

        $showtimes_con_lugares=DB::select('select * from funciones inner join lugares on funciones.id_lugar=lugares.id_lugar where id_pelicula=:id',['id'=>$pelicula->cartelera]);
        $pelicula_info=DB::select('select * from peliculas where id_pelicula=:id',['id'=>$pelicula->cartelera]);
        


       return view('get_ticket')->with('pelicula_info',$pelicula_info)->with('showtimes_con_lugares',$showtimes_con_lugares);
    }

    public function store(){
        return view('get_ticket');
    }

    public function show(){
        return view('showtimes');
    }
}
