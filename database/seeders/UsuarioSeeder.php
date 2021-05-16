<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
       /* Creación de usuario Admin */
       DB::table('usuarios')->insert([
        'usuario_nickname'=>'admin',
        'nombre'=> 'admin',
        'apellido'=>'admin',
        'num_identificacion'=>'1122334455',
        'email'=>'admin@cine.cuc',
        'celular'=>'1122334455',
        //'password'=>Str::random(12),
        'password'=>Hash::make('password'),
        ]);
       
        //Usando Eloquent para crear un usuario seed
        $usuario = new Usuario();
        $usuario->usuario_nickname=Str::random(8);
        $usuario->nombre =Str::random(10);
        $usuario->apellido=Str::random(10);
        $usuario->num_identificacion=random_int(0,9999999999);
        $usuario->email=Str::random(10).'@'.Str::random(5).'.com';
        $usuario->celular=random_int(3000000000,3999999999);
        //$usuario->password=Str::random(10);
        $usuario->password=Hash::make('password');
        $usuario->save();

        //Usando Query Builder para chear un usuario seed
        DB::table('usuarios')->insert([
            'usuario_nickname'=>Str::random(8),
            'nombre' => Str::random(10),
            'apellido'=>Str::random(10),
            'num_identificacion'=>random_int(0,9999999999),
            'celular'=>random_int(3000000000,3999999999),

            'email' => Str::random(10).'@gmail.com',
            'password'=>Hash::make('password'),
            
        ]);


    }
}
