<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use HasFactory;


    protected $primaryKey = 'id_usuario';
    
    protected $fillable = [
        'nombre',
        'apellido',
        'num_identificacion',
        'e_mail',
        'celular',
    ];

    protected $hidden = [
        'password',
    ];


}
