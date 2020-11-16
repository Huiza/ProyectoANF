<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoRatio extends Model
{
    protected $table      = 'tipo_ratios';
    protected $primaryKey = 'id';

    protected $fillable = ['nomnbre_tipo_ratio'];

    
}
