<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lugar extends Model
{
    use HasFactory;

    protected $table='lugares';

    protected $primaryKey = 'id_lugar';

    protected $fillable = [
        'nombre_lugar',
        'direccion',
        'aforo_max',
    ];
}
