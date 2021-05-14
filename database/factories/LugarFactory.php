<?php

namespace Database\Factories;

use App\Models\Lugar;
use Illuminate\Database\Eloquent\Factories\Factory;

class LugarFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lugar::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            //
            'nombre_lugar'=>$this->faker->sentence(3),
            'direccion'=>$this->faker->sentence(3),
            'aforo_max'=>$this->faker->randomNumber(2,true),
        ];
    }
}
