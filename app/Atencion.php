<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atencion extends Model
{
    protected $fillable = ['fecha_publicacion','rut_estudiante','descripcion','medio_atencion'];
}
