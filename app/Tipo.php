<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Empresa;

class tipo extends Model
{
    
    protected $fillable = ['tipo'];

    public function getRouteKeyName()
    {
        return 'id';
    }

      public function empresas()
    {
        return $this->hasMany(Empresa::class);
    }
}