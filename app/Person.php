<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = ['nom', 'cognoms', 'email', 'telf', 'mobil', 'info', 'slug', 'idpubli', 'idtipo' ];
    
    public function publications() {
        return $this->belongsTo('App\Publication', 'id', 'idpubli');
    }
    
    public function type_people() {
        return $this->hasOne('App\TypePerson', 'id', 'idtipo');
    }
}
