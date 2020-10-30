<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\tipo;

class empresa extends Model
{
    //
    protected $fillabel = ['codigo','nombre_empresa','descripcion','tipo_id'];

    public function getRouteKeyName()
    {
        return 'id';
    }

    public function tipo()
    {
        return $this->belongsTo(tipo::class, 'tipo_id', 'id');
    }
}
