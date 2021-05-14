<?php

namespace Database\Factories;

use App\Models\Funcion;
use App\Models\Lugar;
use App\Models\Pelicula;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class FuncionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Funcion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {


        return [
            //
            'id_pelicula'=>Pelicula::all()->random()->id_pelicula,
            'hora_inicio'=>$this->faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
            'hora_fin'=>$this->faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
            'id_lugar'=>Lugar::all()->random()->id_lugar,
            'cupo'=>10,
           
        ];
    }
}
