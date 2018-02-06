<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timelog extends Model
{
  protected $fillable = [
      'data', 'dni', 'entrada', 'sortida', 'festa', 'vacances', 'baixa', 'permis', 'observacions',
  ];

  public function workers() {
      return $this->belongsTo('App\Worker');
  }

}
