<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoEstadoFinanciero extends Model
{
    protected $table      = 'tipo_estado_financieros';
    protected $primaryKey = 'id_tipo_estado_financiero';

    protected $fillable = ['tipo_estado_financiero'];

    public function cuentas()
    {
        return $this->hasMany(EstadoFinanciero::class, 'id_tipo_estado_financiero', 'id_tipo_estado_financiero');
    }
}
