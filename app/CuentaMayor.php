<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CuentaMayor extends Model
{
    protected $table      = 'cuenta_mayors';
    protected $primaryKey = 'id_cuenta_mayor';

    protected $fillable = ['codigo_cuenta', 'nombre_cuenta'];
}
