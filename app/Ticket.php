<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public function publications() {
        return $this->belongsTo('App\Publication', 'id', 'idclient');
    }
}
