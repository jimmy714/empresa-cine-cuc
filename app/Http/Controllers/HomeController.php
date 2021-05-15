<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {

        //Se deben cargar las peliculas disponibles

        $cartelera = DB::table('peliculas')
            ->get();

        return view('home')->with('cartelera', $cartelera);
    }

    public function show(Request $request)
    {

        $showtimes_con_lugares = DB::select(

            'SELECT funciones.id_funcion,funciones.hora_inicio,funciones.hora_fin,funciones.cupo,
                    lugares.nombre_lugar,lugares.direccion,lugares.aforo_max
            FROM funciones
            INNER JOIN lugares ON funciones.id_lugar=lugares.id_lugar
            WHERE id_pelicula=:id',
            ['id' => $request->cartelera]
        );

        $pelicula_info = DB::select(

            'SELECT id_pelicula,nombre_pelicula,descripcion,director,genero,solo_adultos,poster 
            FROM peliculas 
            WHERE id_pelicula=:id',
            ['id' => $request->cartelera]
        );



        return view('showtimes')->with('pelicula_info', $pelicula_info)->with('showtimes_con_lugares', $showtimes_con_lugares);
    }


    public function ticket(Request $request)
    {

        $verificar_cupos= DB::select(
            'SELECT 
            CASE
            WHEN cupo>0 THEN true
            ELSE false
            END AS cupo_disponible
            FROM funciones WHERE 
            id_funcion=:id',['id'=>$request->showtime]
        );

        foreach ($verificar_cupos as $verificar_cupo) {
            if($verificar_cupo->cupo_disponible==true)
            {
                //si hay cupo disponible entonces cargo la informacion del formulario de compra y lo envía
                $showtime_for_ticket = DB::select(

                    'SELECT peliculas.nombre_pelicula,peliculas.poster,
                            lugares.nombre_lugar,lugares.direccion,lugares.aforo_max,
                            funciones.hora_inicio,funciones.hora_fin,funciones.cupo
                    FROM funciones 
                    INNER JOIN lugares ON funciones.id_lugar=lugares.id_lugar 
                    INNER JOIN peliculas ON funciones.id_pelicula=peliculas.id_pelicula
                    WHERE id_funcion=:id AND cupo>0',
                    ['id' => $request->showtime]
                );

                return view('get_ticket')->with('showtime_for_ticket',$showtime_for_ticket);
                //return $showtime_for_ticket;
            }
            else{
                //si no hay cupo disponible retornar a la lista de funciones
                return redirect()->route('showtimes',['cartelera'=>$request->peliculaid])->with('status','Lo sentimos, la funcion solicitada se ha quedado sin cupos disponibles');
            }
        }








        /*aqui se verifica si la función tiene cupo disponible


        return view('get_ticket')->with('showtime_for_ticket',$showtime_for_ticket);
        
    }

    public function store(){

        /*aqui nuevamente se verifica si la función tiene cupo solicitado 
        
        si lo tiene, intenta realizar la operación :  cupo_disponible-numero_de_boletas_solicitado

        Si luego de la operación se cumple que cupo_disponible es 0 o más que cero

        Se retorna mensaje de exito y se redirije al dashboard

        Sino retorna mensaje de error y se reverifica el cupo disponible

        
        */




        return;

        //return view('get_ticket')->with('status',$msg_operacion);
    }
}
