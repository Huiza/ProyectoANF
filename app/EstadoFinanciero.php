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
        return $this->belongsTo(TipoEstadoFinanciero::class, 'id_tipo_estado_financiero', 'id_tipo_estado_financiero');
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'id_empresa', 'id');
    }

    public function detallesEstado()
    {
        return $this->hasMany(DetalleEstadosFinancieros::class, 'id_estado_financiero', 'id_estado_financiero');
    }
}
