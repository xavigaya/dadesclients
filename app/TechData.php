<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TechData extends Model
{
    protected $fillable = ['plantilla', 'idpubli', 'observacions', 'idfilmacio', 'identrada'];
    
    public function publications() {
        return $this->belongsTo('App\Publication', 'id', 'idpubli');
    }
    
    public function filmacios() {
        return $this->hasOne('App\Filmacio', 'id', 'idfilmacio');
    }
    
    public function inputs() {
        return $this->hasOne('App\Input', 'id', 'identrada');
    }
}
