<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
                    WHERE id_funcion=:id AND cupo>=0',
                    ['id' => $request->showtime]
                );

                return view('get_ticket')->with('showtime_for_ticket',$showtime_for_ticket);
                //return $showtime_for_ticket;
            }
            else{
                //si no hay cupo disponible retornar a la lista de funciones
                return redirect()->route('showtimes',['cartelera'=>$request->peliculaid])->with('error','Lo sentimos, la funcion solicitada se ha quedado sin cupos disponibles');
            }
        }








        /*aqui se verifica si la función tiene cupo disponible


        return view('get_ticket')->with('showtime_for_ticket',$showtime_for_ticket);*/
     
    }
    

    public function store(Request $request){

        /*aqui nuevamente se verifica si la función tiene cupo solicitado 
        
        si lo tiene, intenta realizar la operación :  
        cupo_disponible-numero_de_boletas_solicitado

        Si luego de la operación se cumple

        Se retorna mensaje de exito y se redirije al dashboard

        Sino retorna mensaje de error y redirige a la lista de funciones
        Para evitar una colición en la verificación, tanto la verificaicon de cupo como la operacion

        de sustraer el cupo solicitado se realiza directamente en la base de datos

        PAra ello se utiliza una funcion y se ejecuta

        
        */

        DB::select(
            'CREATE OR REPLACE FUNCTION confirmarTiquete(id_funcion_req integer,tiquetes_req integer)
            RETURNS boolean AS $$
            DECLARE operacion_result boolean;
            BEGIN
            IF(SELECT cupo FROM funciones WHERE id_funcion=id_funcion_req)>=tiquetes_req
            THEN
                UPDATE funciones SET cupo=(CASE WHEN cupo>=tiquetes_req THEN cupo-tiquetes_req ELSE cupo END)
                WHERE id_funcion=id_funcion_req;
                RETURN true;
            ELSE 
                RETURN false;
            END IF;
            END; --Ejecutado desde Laravel
            $$
            LANGUAGE plpgsql;'
        );

        $confirmar_cupos=DB::select(
            'SELECT confirmarTiquete(:id,:tiquetes)',
        
        ['id'=>$request->showtime,'tiquetes'=>$request->tiquetes]
        );
       
       if($confirmar_cupos==true)
       {
            for($i=1;$i<=$request->tiquetes;$i++)
            {
                DB::insert(
                    'INSERT INTO tiquetes(id_usuario,fecha_up,id_funcion)
                     VALUES (:id_usuario,:fecha_generacion,:funcion)',
                    [
                        'id_usuario'=>Auth::user()->id_usuario,
                        'fecha_generacion'=>Carbon::now()->toDateTimeString(),
                        'funcion'=>$request->showtime
                    ]
                );
                
            }

            return redirect('user_panel')->with('status','Transacción exitosa');
       }
       else
       {
            return redirect()->back()->with('error','Transacción no exitosa, intente de nuevo');
       }
       

    }
}
