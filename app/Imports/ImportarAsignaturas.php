<?php

namespace App\Imports;

use App\Asignatura;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportarAsignaturas implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Asignatura([

            'codigo'     => @$row[0],
            'NRC'        => @$row[1], 
            'asignatura' => @$row[2]
            
        ]);
    }
}
