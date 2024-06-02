<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class pedidorequest extends FormRequest
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
            'nombre' => 'required',
            'apellido' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'formaPago' => 'required',
           
        ];
    }
    public function messages(): array
    {
        return [
            'nombre.required' => 'falta agregar el nombre ',
            'apellido.required' => 'falta agregar el apellido',
            'direccion.required' => 'falta agregar la direccion',
            'telefono.required' => 'falta agregar el telefono',
            'formaPago.required' => 'falta la forma de pago',
           
        ];
    }
}
