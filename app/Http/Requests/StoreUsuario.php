<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsuario extends FormRequest
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
            //aqui podriamos usar unique:usuarios para validar los valores únicos

            'email' => 'required|string|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'usuario_nickname'=>'required|string|regex:/^[a-zA-Z0-9\_\-]{4,16}$/',
            'password' => 'required|string|regex:/^[a-zA-Z0-9\_\-]{8,}$/',
            'nombre'=> 'required|string',
            'apellido'=> 'required|string',
            'celular'=> 'required|string|regex:/^[0-9]+$/',
            'num_identificacion'=> 'required|string|regex:/^[0-9]+$/',
        
        ];
    }
}
