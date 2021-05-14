<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcion extends Model
{
    use HasFactory;

    protected $table='funciones';

    protected $primaryKey = 'id_funcion';

    protected $fillable = [
        'id_pelicula',
        'hora_inicio',
        'hora_fin',
        'id-lugar',
        'cupo',
    ];


}
