<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fecha extends Model
{
    public static function fechaTexto($fecha){
    	$fecha_actual = str_replace("/","-",$fecha);
        $nueva_fecha = date("d-m-Y",strtotime($fecha_actual));
        $fecha = strftime("%d de %B de %Y",strtotime($nueva_fecha));
        return $fecha;
    }
}
