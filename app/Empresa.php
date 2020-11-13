<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tipo;
use App\EstadoFinanciero;

class empresa extends Model
{
    //
    protected $fillable = ['nombre_empresa','descripcion','tipo_id'];

    public function getRouteKeyName()
    {
        return 'id';
    }

    public function tipo()
    {
        return $this->belongsTo(Tipo::class, 'tipo_id', 'id');
    }

    public function estadosFinancieros()
    {
        return $this->hasMany(EstadoFinanciero::class, 'id_empresa', 'id');
    }
}