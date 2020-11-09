<?php

namespace App\Imports;

use App\EstadoFinanciero;
use Maatwebsite\Excel\Concerns\ToModel;

class EstadoFinancieroImport implements ToModel
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
        return new EstadoFinanciero([
            //
            'cuenta'=>$row[0],
            'saldo'=>$row[1],
        ]);
    }
}
