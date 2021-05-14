<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_pelicula';

    protected $fillable = [
        'nombre_pelicula',
        'descripcion',
        'director',
        'genero',
        'solo_adultos',
        'poster',
    ];
}
