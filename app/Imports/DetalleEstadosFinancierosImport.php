<?php

namespace App\Imports;

use App\DetalleEstadosFinancieros;
use App\EstadoFinanciero;
use Maatwebsite\Excel\Concerns\ToModel;


class DetalleEstadosFinancierosImport implements ToModel
{
    protected static $id;
   
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public static function setTipoEstadoFinanciero(EstadoFinanciero $estado_financiero){
        self::$id=$estado_financiero->id;
    }

    public static function getTipoEstadoFinanciero(){
        return self::$id;
    }
    public function model(array $row)
    {
        return new DetalleEstadosFinancieros([
            //
            'id_estado_financiero'=>self::getTipoEstadoFinanciero(),
            'cuenta'=>$row[0],
            'saldo'=>$row[1],
        ]);
    }
}
