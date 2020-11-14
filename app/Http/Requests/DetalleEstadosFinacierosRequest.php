<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DetalleEstadosFinacierosRequest extends FormRequest
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
            'cuenta' => 'required|max:100|regex:/[a-zA-ZñÑáéíóúÁÉÍÓÚ]/',
            'saldo' => 'required',
            'id_estado_financiero'          => 'required',
        ];

       
    }

    public function messages()
    {
        return [
            //'codigo.required' => 'El campo código es obligatorio.',
    
            'cuenta.required'=> 'El campo cuenta es obligatorio.',
            'cuenta.max' => 'La cantidad máxima de carácteres es 100.',
            'cuenta.regex' => 'Los carácteres deben ser solo letras.',

            'saldo'=>'Debe ingresar ekl monto de la cuenta',
            
            'id_estado_financiero.required'          => 'Debe seleccionar un tipo de estado financiero',
        ];
    }
}
