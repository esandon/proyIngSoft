<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{

    protected $fillable = ['rut','apellido_paterno','apellido_materno','nombre','codigo_carrera','correo_electronico'];

    /**
     * A un estudiante le pertenecen muchas atenciones
     */

    public function atencion(){
        return $this->hasMany(Atencion::class);
    }

    public function scopeNombre($query, $nombre) {
    	if ($nombre) {
    		return $query->where('nombre','like',"%$nombre%");
    	}
    }

    public function scopeRut($query, $rut) {
    	if ($rut) {
    		return $query->where('rut','like',"%$rut%");
    	}
    }

}
