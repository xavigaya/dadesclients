<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timelog extends Model
{
  protected $fillable = [
      'data', 'dni', 'entrada', 'sortida', 'festa', 'vacances', 'baixa',
  ];

  public function workers() {
      return $this->belongsTo('App\Worker');
  }

}
