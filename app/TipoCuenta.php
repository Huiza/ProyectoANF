<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoCuenta extends Model
{
    protected $table      = 'tipo_cuentas';
    protected $primaryKey = 'id_tipo_cuenta';

    protected $fillable = ['nombre_tipo_cuenta'];

    public function cuentas()
    {
        return $this->hasMany(Cuentas::class, 'id_tipo_cuenta', 'id_tipo_cuenta');
    }
}
