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

    public function show(Request $request){

        $showtimes_con_lugares=DB::select('select * from funciones inner join lugares on funciones.id_lugar=lugares.id_lugar where id_pelicula=:id',['id'=>$request->cartelera]);
        $pelicula_info=DB::select('select * from peliculas where id_pelicula=:id',['id'=>$request->cartelera]);
        


       return view('showtimes')->with('pelicula_info',$pelicula_info)->with('showtimes_con_lugares',$showtimes_con_lugares);
    }


    public function ticket(Request $request){


        /*aqui se verifica si la función tiene cupo disponible

        si hay al menos 1, 2 o e
        
        se habilita el selector de número de boletas si hay mas de 3 

        se pueden comprar máximo 3 tiquetes simultáneamente

        Se habilita el botón de comprar y envío de formulario, sino, se muestra un modal diciendo que ya no hay tiquetes disponibles



        
        */


        return view('get_ticket')->with('showtime_for_ticket',$request->showtime);
        //return $showtime;
    }

    public function store(){

        /*aqui nuevamente se verifica si la función tiene cupo solicitado 
        
        si lo tiene, intenta realizar la operación :  cupo_disponible-numero_de_boletas_solicitado

        Si luego de la operación se cumple que cupo_disponible es 0 o más que cero

        Se retorna mensaje de exito y se redirije al dashboard

        Sino retorna mensaje de error y se reverifica el cupo disponible

        
        */
        $msg_operacion='Transaccion exitosa';
        $msg_operacion='Falló operacion';





        return view('get_ticket')->with('status',$msg_operacion);
    }


}
