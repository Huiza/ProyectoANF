<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpresaRequest extends FormRequest
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
            'codigo'=> 'required|max:7|regex:/[A-Za-z]{2}[0-9]{5}/',
            'nombre' => 'required|max:100|regex:/[a-zA-ZñÑáéíóúÁÉÍÓÚ]/',
            'descripcion' => 'required|max:100|regex:/[a-zA-ZñÑáéíóúÁÉÍÓÚ]/',
            'tipo_id'          => 'required',
        ];

        return [
            'codigo.required' => 'El campo código es obligatorio.',
            'codigo.max'=> 'La cantidad máxima de carácteres es 7.',
            'carne.regex'=> 'El formato debe ser AA#####',

            'nombre.required'=> 'El campo nombre es obligatorio.',
            'nombre.max' => 'La cantidad máxima de carácteres es 100.',
            'nombre.regex' => 'Los carácteres deben ser solo letras.',
            
            'descripcion.required'=> 'El campo descripcion es obligatorio.',
            'descripcion.max'=> 'La cantidad máxima de carácteres es 100.',
            'desccripcion.regex'=> 'Los carácteres deben ser solo letras.',
            
            'tipo_id.required'          => 'Debe seleccionar un tipo',
        ];
    }
}
