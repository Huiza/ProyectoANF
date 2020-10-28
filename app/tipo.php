<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\empresa;

class tipo extends Model
{
    
    protected $fillabel = ['tipo'];

    public function getRouteKeyName()
    {
        return 'id';
    }

      public function empresas()
    {
        return $this->hasMany(empresa::class);
    }
}
