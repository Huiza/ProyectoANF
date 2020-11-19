<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculadoraController extends Controller
{
    public function calcular_ratios()
    {
        return view('Calculadora.calculadora_ratios');
    }
}
