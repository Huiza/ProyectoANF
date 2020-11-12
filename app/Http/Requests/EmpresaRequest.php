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
            //'codigo'=> 'required|string',
            'nombre_empresa' => 'required|max:100|regex:/[a-zA-ZñÑáéíóúÁÉÍÓÚ]/',
            'descripcion' => 'required|max:100|regex:/[a-zA-ZñÑáéíóúÁÉÍÓÚ]/',
            'tipo_id'          => 'required',
        ];

       
    }

    public function messages()
    {
        return [
            //'codigo.required' => 'El campo código es obligatorio.',
    
            'nombre_empresa.required'=> 'El campo nombre es obligatorio.',
            'nombre_empresa.max' => 'La cantidad máxima de carácteres es 100.',
            'nombre_empresa.regex' => 'Los carácteres deben ser solo letras.',
            
            'descripcion.required'=> 'El campo descripcion es obligatorio.',
            'descripcion.max'=> 'La cantidad máxima de carácteres es 100.',
            'desccripcion.regex'=> 'Los carácteres deben ser solo letras.',
            
            'tipo_id.required'          => 'Debe seleccionar un tipo',
        ];
    }

}
