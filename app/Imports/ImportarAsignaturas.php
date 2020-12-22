<?php

namespace App\Imports;

use App\Asignatura;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\OnEachRow;

class ImportarAsignaturas implements OnEachRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    
    public function onRow(Row $row)
    {
        $row =$row->toArray();
        $Asignatura = Asignatura::firstOrCreate(
            [
                'codigo'     => @$row[0],
                'NRC'    => @$row[1], 
                'asignatura'    => @$row[2],
            ]
        );

        if(! $Asignatura->wasRecentlyCreates){
            $Asignatura->update([
                'codigo'     => @$row[0],
                'NRC'    => @$row[1], 
                'asignatura'    => @$row[2],
            ]);
        }

    }

}
