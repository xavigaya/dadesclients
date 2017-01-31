<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['nom'];

    public function worker() {
        return $this->belongsTo('App\Team', 'equip', 'id');
    }
}
