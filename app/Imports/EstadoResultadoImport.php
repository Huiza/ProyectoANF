<?php

namespace App\Imports;

use App\EstadoResultado;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class EstadoResultadoImport implements ToModel,WithCalculatedFormulas
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new EstadoResultado([
            //
            'nombre_cuenta'=>$row[0],
            'saldo'=>$row[1],
        ]);
    }
}
