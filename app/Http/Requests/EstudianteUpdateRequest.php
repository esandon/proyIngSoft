<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EstudianteUpdateRequest extends FormRequest
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
        return
        [
            'correo_electronico'=>'required', 'string', 'email', 'max:255', 'unique:estudiantes,correo_electronico'.$this->Estudiante,
        ];        
    }

    public function messages(){
        return [
            'correo_electronico.required' => 'El campo Correo electronico no puede estar vacío',
        ];
    }
}