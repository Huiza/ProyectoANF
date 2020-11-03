<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalogo extends Model
{
    protected $table      = 'catalogo';
    protected $primaryKey = 'id';

    protected $fillable = ['id_empresa','id_cuenta', 'codigo_cuenta'];

    public function cuenta()
    {
        return $this->hasMany(Cuenta::class, 'id_cuenta', 'id_cuenta');

    }
    public function empresa()
    {
        return $this->belongsTo(empresa::class, 'id_empresa', 'codigo');

    }
}
