<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypePerson extends Model
{
    protected $fillable = ['tipus'];
    
    public function people() {
        return $this->belongsTo('App\Person', 'idtipo', 'id');
    }
}
