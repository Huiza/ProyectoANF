<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubcuentaSecundaria extends Model
{
    protected $table      = 'subcuenta_secundarias';
    protected $primaryKey = 'id_subcuenta_secundaria';

    protected $fillable = ['id_subcuenta_primaria', 'nombre_subcuenta_secundaria'];

    public function cuentaTerciaria()
    {
        return $this->hasMany(SubcuentaTerciaria::class, 'id_subcuenta_secundaria', 'id_subcuenta_secundaria');
    }
}
