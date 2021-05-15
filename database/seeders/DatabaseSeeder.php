<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        
        \App\Models\Pelicula::factory(10)->create();
        \App\Models\Lugar::factory()->count(5)->create();
        \App\Models\Funcion::factory()->count(100)->create();

    }
}
