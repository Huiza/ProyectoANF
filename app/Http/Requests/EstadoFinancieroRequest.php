<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstadoFinancieroRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            //'codigo'=> 'required|string',
            'fecha_inicio' => 'required',
            'fecha_final' => 'required',
            'id_tipo_estado_financiero'          => 'required',
        ];

       
    }

    public function messages()
    {
        return [
            //'codigo.required' => 'El campo código es obligatorio.',
    
            'fecha_inicio.required'=> 'El campo fecha inicio es obligatorio.',

            'fecha_final.required'=> 'El campo fecha final es obligatorio.',

            'id_tipo_estado_financiero.required'          => 'Debe seleccionar un tipo de estado financiero',
        ];
    }
}
