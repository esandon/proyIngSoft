<?php

namespace App\Imports;

use App\Estudiante;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportarEstudiantes implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Estudiante([

            'rut'     => @$row[0],
            'apellido_paterno'    => @$row[1], 
            'apellido_materno'    => @$row[2],
            'nombre'    => @$row[3],
            'codigo_carrera'    => @$row[4],
            'correo_electronico'    => @$row[5]
        ]);
    }
}
