<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RatioFinanciero extends Model
{
    
    protected $table      = 'ratio_financieros';
    protected $primaryKey = 'id';

    protected $fillable = ['id_estado_financiero', 'nombre_ratio', 'calculo_ratio'];

    public function estadosFinanciero()
    {
        return $this->belongsTo(EstadoFinanciero::class, 'id_estado_financiero', 'id_estado_financiero');
    }
}
