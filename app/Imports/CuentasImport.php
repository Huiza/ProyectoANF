<?php

namespace App\Imports;

use App\Cuenta;
use Maatwebsite\Excel\Concerns\ToModel;

class CuentasImport implements ToModel
{
    protected $tipo_id;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function __construct($tipo_id){
        $this->$tipo_id=$tipo_id;
    }

    public function model(array $row)
    {
        return new Cuenta([
            //
            'id_tipo_cuenta'=>$row[0],
            'nombre_cuenta'=>$row[1],
        ]);
    }
}
