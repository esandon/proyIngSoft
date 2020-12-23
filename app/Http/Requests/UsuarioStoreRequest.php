<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioStoreRequest extends FormRequest
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
            'rut'=>'required|min:8|max:9|unique:users,rut',
            'name'=>'required|string|min:3|max:15',
            'rol' =>'required',
            'password' => 'required|confirmed|min:6',
            'email' => 'required|email|min:11|max:50|unique:users,email'
        ];


    }

    public function messages(){
        return [

            'rut.unique' => 'Ya existe el rut ingresado.',
            'name.required' => 'El campo Nombre no puede estar vacío',
            'rut.required' => 'El campo RUT no puede estar vacío',
            'email.required' => 'El campo E-mail no puede estar vacío',
            'email.unique' => 'El E-mail ya existe',
        ];
    }
}
