<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [        
           
                'name' => ['required', 'name_validation', 'max:30', 'min:3'], 
                'lastName' => ['required', 'name_validation', 'max:30', 'min:3'],
                'phone' => ['required', 'number_validation', 'max:10', 'min:8', 'unique:phones'],
                'email' => ['required', 'unique:users', 'email_validation'],
                'password' => ['required', 'password_validation'],                
            ]; 
    }

    public function messages(){

        return [

        'name.required' => 'El nombre es requerido.',
        'name.namevalidation' => 'Debe escribir un nombre correcto.',
        'name.max' => 'El nombre no debe sobre psar los 30 caracteres.',
        'name.min' => 'El nombre debe tener al menos 3 caracteres',

        'lastName.required' => 'El apellido es requerido.',
        'lastName.namevalidation' => 'Debe escribir un apellido correcto.',
        'lastName.max' => 'El apellido no debe sobre psar los 30 caracteres.',
        'lastName.min' => 'El apellido debe tener al menos 3 caracteres',

        'phone.required' => 'El telefono es obligatorio.',
        'phone.number_validation' => 'Debe escribir un telefono valido.',
        'phone.max' => 'El telefono debe tener un maximo de 10 digitos.',
        'phone.min' => 'El telefono debe tener un minimo de 8 digitos.',
        
        'email.required' => 'El correo electrnico es obligatorio.',
        'email.email_validation' => 'Debe escribir un correo electronico valido.',
        'email.unique' => 'El email ya existe, debe ingresar otro correo.',

        'password.required' => 'Debe crear una clave deacceso.',
        'password.password_validation' => 'Debe poner una clave mas seguro.',


        ];
    }


}
