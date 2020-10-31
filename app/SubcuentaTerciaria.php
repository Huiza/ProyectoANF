<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubcuentaTerciaria extends Model
{
    protected $table      = 'subcuenta_terciarias';
    protected $primaryKey = 'id_subcuenta_terciaria';

    protected $fillable = ['id_subcuenta_secundaria','nombre_subcuenta_terciaria'];

    public function cuentaCuaternaria()
    {
        return $this->hasMany(SubcuentaCuaternaria::class, 'id_subcuenta_terciaria', 'id_subcuenta_terciaria');
    }
}
