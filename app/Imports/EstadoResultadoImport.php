<?php

namespace App\Imports;

use App\EstadoResultado;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class EstadoResultadoImport implements ToModel,WithCalculatedFormulas
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
        return new EstadoResultado([
            //
            'nombre_cuenta'=>$row[0],
            'saldo'=>$row[1],
        ]);
    }
}
