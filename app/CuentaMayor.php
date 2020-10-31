<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CuentaMayor extends Model
{
    protected $table      = 'cuenta_mayors';
    protected $primaryKey = 'id_cuenta_mayor';

    protected $fillable = ['nombre_cuenta'];

    public function cuentaPrimaria()
    {
        return $this->hasMany(SubcuentaPrimaria::class, 'id_cuenta_mayor', 'id_cuenta_mayor');
    }
}
