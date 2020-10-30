<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubcuentaPrimaria extends Model
{
    protected $table      = 'subcuenta_primarias';
    protected $primaryKey = 'id_subcuenta_primaria';

    protected $fillable = ['id_cuenta_mayor','nombre_subcuenta_primaria'];

    public function cuentaMayor()
    {
        return $this->hasMany(CuentaMayor::class, 'id_cuenta_mayor', 'id_cuenta_mayor');
    }
}
