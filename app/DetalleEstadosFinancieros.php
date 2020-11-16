<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleEstadosFinancieros extends Model
{
    protected $table      = 'detalle_estados_financieros';
    protected $primaryKey = 'id_detalle_estados_financieros';

    protected $fillable = ['id_estado_financiero', 'cuenta', 'saldo'];

    public function estadosFinanciero()
    {
        return $this->belongsTo(EstadoFinanciero::class, 'id_estado_financiero', 'id_estado_financiero');
    }
}
