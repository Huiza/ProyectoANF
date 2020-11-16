<?php

namespace App\Imports;

use App\Cuenta;
use Maatwebsite\Excel\Concerns\ToModel;

class CuentasImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Cuenta([
            //
            'id_tipo_cuenta'=>$row[0],
            'nombre_cuenta'=>$row[1],
        ]);
    }
}
