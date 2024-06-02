<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class registrorequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
         'tipoIdentificacion' => 'required',
         'Identificaion' => 'required',
         'username' => 'required',
         'email' => 'required',
         'id_Rol' => 'required',
         'password' => 'required|min:8',
         'password_confirmation' => 'required|same:password',
       
        ]; 
        
       
    }
    public function messages(): array
{
    return [
        'username.required' => 'El campo nombre es obligatorio.',
        'username.string' => 'El campo nombre debe ser una cadena de caracteres.',
        'username.max' => 'El campo nombre no debe exceder los 255 caracteres.',
        'tipoIdentificacion.required' => 'El campo tipo de identificación es obligatorio.',
        'Identificaion.required' => 'El campo tipo de identificación es obligatorio.',
    
        'email.required' => 'El campo email es obligatorio.',
        'email.email' => 'El campo email debe ser una dirección de correo válida.',
        'email.unique' => 'El email ya ha sido registrado.',
        'id_Rol.required' => 'El campo rol es obligatorio.',
        'password.required' => 'La contraseña es obligatoria.',
        'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
        'password_confirmation.required' => 'La confirmación de contraseña es obligatoria.',
        'password_confirmation.same' => 'La confirmación de contraseña no coincide.',
    ];
}
}
