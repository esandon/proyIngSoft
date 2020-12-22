<?php

namespace App\Imports;

use App\Estudiante;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\OnEachRow;

/*WithValidation,WithHeadingRow*/
class ImportarEstudiantes implements OnEachRow
{

    
    public function onRow(Row $row)
    {
        $row =$row->toArray();
        $Estudiante = Estudiante::firstOrCreate(
            [
                'rut'     => @$row[0],
                'apellido_paterno'    => @$row[1], 
                'apellido_materno'    => @$row[2],
                'nombre'    => @$row[3],
                'codigo_carrera'    => @$row[4],
                'correo_electronico'    => @$row[5],
            ]
        );

        if(! $Estudiante->wasRecentlyCreates){
            $Estudiante->update([
                'rut'     => @$row[0],
                'apellido_paterno'    => @$row[1], 
                'apellido_materno'    => @$row[2],
                'nombre'    => @$row[3],
                'codigo_carrera'    => @$row[4],
                'correo_electronico'    => @$row[5],
            ]);
        }

    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    /*
    public function model(array $row)
    {
        
        return new Estudiante([

            'rut'     => @$row['0'],
            'apellido_paterno'    => @$row['1'], 
            'apellido_materno'    => @$row['2'],
            'nombre'    => @$row['3'],
            'codigo_carrera'    => @$row['4'],
            'correo_electronico'    => @$row['5']
        ]);
    }


    /*
    public function rules(): array
    {
        return [
            'rut' => 'required|max:9',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'nombre' => 'required',
            'codigo_carrera' => 'required',
            'correo_electronico' => 'nullable'
        ];
    }
    */
    
}
