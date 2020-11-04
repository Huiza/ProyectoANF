<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tipo;

class empresa extends Model
{
    //
    protected $fillable = ['codigo','nombre_empresa','descripcion','tipo_id'];

    public function getRouteKeyName()
    {
        return 'id';
    }

    public function tipo()
    {
        return $this->belongsTo(Tipo::class, 'tipo_id', 'id');
    }
}