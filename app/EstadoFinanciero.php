<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoFinanciero extends Model
{
    public $timestamps = false;
    protected $table      = 'estado_financieros';
    protected $primaryKey = 'id_estado_financiero';

    protected $fillable = ['id_tipo_estado_financiero','id_empresa','fecha_inicio', 'fecha_final'];

    public function tipoEstadoFinanciero()
    {
        return $this->belongsTo(tipoEstadoFinanciero::class, 'id_tipo_estado_financiero', 'id_tipo_estado_financiero');
    }
}
