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

        $showtimes_con_lugares=DB::select(

            'SELECT funciones.id_funcion,funciones.hora_inicio,funciones.hora_fin,funciones.cupo,
                    lugares.nombre_lugar,lugares.direccion,lugares.aforo_max
            FROM funciones
            INNER JOIN lugares ON funciones.id_lugar=lugares.id_lugar
            WHERE id_pelicula=:id',['id'=>$request->cartelera]);
        
        $pelicula_info=DB::select(

            'SELECT nombre_pelicula,descripcion,director,genero,solo_adultos,poster 
            FROM peliculas 
            WHERE id_pelicula=:id',['id'=>$request->cartelera]);


        
       return view('showtimes')->with('pelicula_info',$pelicula_info)->with('showtimes_con_lugares',$showtimes_con_lugares);
    }


    public function ticket(Request $request){

      $showtime_for_ticket=DB::select(
          
            'SELECT peliculas.nombre_pelicula,peliculas.poster,
                    lugares.nombre_lugar,lugares.direccion,lugares.aforo_max,
                    funciones.hora_inicio,funciones.hora_fin,funciones.cupo
            FROM funciones 
            INNER JOIN lugares ON funciones.id_lugar=lugares.id_lugar 
            INNER JOIN peliculas ON funciones.id_pelicula=peliculas.id_pelicula
            WHERE id_funcion=:id',['id'=>$request->showtime]);
          
        
        
        
        
        


        /*aqui se verifica si la función tiene cupo disponible

        si hay al menos 1, 2 o e
        
        se habilita el selector de número de boletas si hay mas de 3 

        se pueden comprar máximo 3 tiquetes simultáneamente

        Se habilita el botón de comprar y envío de formulario, sino, se muestra un modal diciendo que ya no hay tiquetes disponibles



        
        */


        //return view('get_ticket')->with('showtime_for_ticket',$request->showtime);
        return $showtime_for_ticket;
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
