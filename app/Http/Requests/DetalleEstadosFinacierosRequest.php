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
            'cuenta'=>'required'
            'saldo' => 'required',
        ];

       
    }

    public function messages()
    {
        return [
            'cuenta'=>'Debe ingresar la cuenta',
            'saldo'=>'Debe ingresar el monto de la cuenta',
        ];
    }
}
