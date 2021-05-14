<?php

namespace Database\Seeders;

use App\Models\Funcion;
use App\Models\Pelicula;
use Illuminate\Database\Seeder;

class FuncionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Funcion::factory()->count(100)->create();


    }
}
