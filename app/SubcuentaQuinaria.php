<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubcuentaQuinaria extends Model
{
    protected $table      = 'subcuenta_quinarias';
    protected $primaryKey = 'id_subcuenta_quinaria';

    protected $fillable = ['id_subcuenta_cuaternaria','nombre_subcuenta_quinaria'];

   
}
