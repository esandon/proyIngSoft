<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExcelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
           
            'rut'                   =>'required|min:8|max:9|unique:estudiantes,rut',
            'apellido_paterno'      =>'required|string|min:3|max:15',
            'apellido_materno'      =>'required|string|min:3|max:15',
            'nombre'                =>'required|string|min:6|max:15',
            'codigo_carrera'        =>'required|numeric|min:3|max:6',
            'correo_electronico'    => 'email|min:11|max:50|unique:estudiantes,email'
        ];


    }

    public function messages(){
        return [

           
        ];
    }
}
