<?php

namespace App\Imports;

use App\DetalleEstadosFinancieros;
use Maatwebsite\Excel\Concerns\ToModel;

class DetalleEstadosFinancierosImport implements ToModel
{
      public static $tipo_id;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public static function setTipoEstadoFinanciero($id){
        print(self::$tipo_id=$id);

    }
    public function model(array $row)
    {
        return new DetalleEstadosFinancieros([
            //
            'id_estado_financiero'=>1,
            'cuenta'=>$row[0],
            'saldo'=>$row[1],
        ]);
    }
}
