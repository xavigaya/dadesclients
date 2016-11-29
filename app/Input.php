<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Input extends Model
{
    protected $fillable = ['nom', 'usuari', 'password'];
    
    public function tech_datas() {
        return $this->belongsTo('App\TechData', 'identrada', 'id');
    }
}
