<?php

namespace App\Imports;

use App\DetalleEstadosFinancieros;
use App\EstadoFinanciero;
use Maatwebsite\Excel\Concerns\ToModel;


class DetalleEstadosFinancierosImport implements ToModel
{
   public $id_estado_financiero;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function __construct($id)
            {
                $this->id_estado_financiero = $id; // errro en en linea
            }

    /*static public function setTipoEstadoFinanciero(EstadoFinanciero $estado_financiero){
        DetalleEstadosFinancierosImport::$id_tipo_estado_financiero=1;
    }*/

    /*static public  function getTipoEstadoFinanciero(){
        return DetalleEstadosFinancierosImport::$id_tipo_estado_financiero;
    }*/
    public function model(array $row)
    {
        return new DetalleEstadosFinancieros([
            //
            'id_estado_financiero'=>$this->id_estado_financiero,
            'cuenta'=>$row[0],
            'saldo'=>$row[1],
        ]);
       
    }
}
