<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $fillable = ['rut','apellido_paterno','apellido_materno','nombre','codigo_carrera','correo_electronico'];
}
