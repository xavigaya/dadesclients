<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\PublicationFormRequest;

class Publication extends Model
{
    protected $fillable = ['nom', 'slug', 'status', 'idclient', 'observa', 'mides', 'format', 'forn'];
    
    public function customers() {
        return $this->belongsTo('App\Customer', 'id', 'idclient');
    }
    
    public function tickets() {
        return $this->hasMany('App\Ticket', 'idclient', 'id');
    }
    
    public function people() {
        return $this->hasMany('App\Person', 'idpubli', 'id');
    }
    
    public function tech_datas() {
        return $this->hasOne('App\TechData', 'id', 'idpubli');
    }
}
