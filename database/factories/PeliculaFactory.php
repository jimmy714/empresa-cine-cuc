<?php

namespace Database\Factories;

use App\Models\Pelicula;
use Illuminate\Database\Eloquent\Factories\Factory;

class PeliculaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pelicula::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'nombre_pelicula'=>$this->faker->sentence(4),
            'descripcion'=>$this->faker->paragraph(5),
            'director'=>$this->faker->sentence(2),
            'genero'=>$this->faker->sentence(1),
            'solo_adultos'=>$this->faker->boolean(),
            'poster'=>$this->faker->sentence(),
        ];
    }
}
