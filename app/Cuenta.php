<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    protected $table      = 'cuentas';
    protected $primaryKey = 'id_cuenta';

    protected $fillable = ['id_tipo_cuenta','nombre_cuenta'];

    public function tipoCuenta()
    {
        return $this->belongsTo(TipoCuenta::class, 'id_tipo_cuenta', 'id_tipo_cuenta');
    }
}
