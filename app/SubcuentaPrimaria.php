<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubcuentaPrimaria extends Model
{
    protected $table      = 'subcuenta_primarias';
    protected $primaryKey = 'id_subcuenta_primaria';

    protected $fillable = ['id_cuenta_mayor','nombre_subcuenta_primaria'];

    public function cuentaSecundaria()
    {
        return $this->hasMany(SubcuentaSecundaria::class, 'id_subcuenta_primaria', 'id_subcuenta_primaria');
    }
}
