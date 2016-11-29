<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filmacio extends Model
{
    protected $fillable = ['nom'];
    
    public function tech_datas() {
        return $this->belongsTo('App\TechData', 'idfilmacio', 'id');
    }
}
