<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubcuentaSecundaria extends Model
{
    protected $table      = 'subcuenta_secundarias';
    protected $primaryKey = 'id_subcuenta_secundaria';

    protected $fillable = ['id_subcuenta_primaria', 'codigo_subcuenta_secundaria', 'nombre_subcuenta_secundaria'];

    public function subcuentaPrimaria()
    {
        return $this->hasMany(SubcuentaPrimaria::class, 'id_subcuenta_primaria', 'id_subcuenta_primaria');
    }
}