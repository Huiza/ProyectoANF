<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubcuentaCuaternaria extends Model
{
    protected $table      = 'subcuenta_cuaternarias';
    protected $primaryKey = 'id_subcuenta_cuaternaria';

    protected $fillable = ['id_subcuenta_terciaria','nombre_subcuenta_cuaternaria'];

    public function cuentaQuinaria()
    {
        return $this->hasMany(SubcuentaQuinaria::class, 'id_subcuenta_cuaternaria', 'id_subcuenta_cuaternaria');
    }
}
