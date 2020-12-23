<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExcelAsignaturaRequest extends FormRequest
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
           
            'codigo'        =>'required|min:8|max:10',
            'NRC'           =>'required|numeric|min:4|max:15',
            'asignatura'    =>'required|string|min:5|max:50',
           
        ];
    }

    public function messages(){
        return [

            'codigo.required'       =>'El codigo es obligatorio ',
            'NRC.required'          =>'El NRC es obligatorio',
            'asignatura.required'   =>'La asignatura es obligatoria',
            
        ];
    }
}
