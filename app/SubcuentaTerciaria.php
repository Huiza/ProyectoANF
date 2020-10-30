<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubcuentaTerciaria extends Model
{
    protected $table      = 'subcuenta_terciarias';
    protected $primaryKey = 'id_subcuenta_terciaria';

    protected $fillable = ['id_subcuenta_secundaria','nombre_subcuenta_terciaria'];

    public function subcuentaSecundaria()
    {
        return $this->hasMany(SubcuentaSecundaria::class, 'id_subcuenta_secundaria', 'id_subcuenta_secundaria');
    }
}
