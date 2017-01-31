<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'nom', 'cognoms', 'dni', 'equip',
  ];

  public function teams() {
      return $this->hasOne('App\Team', 'id', 'equip');
  }

  public function timelogs() {
      return $this->hasmany('App\Timelog', 'dni', 'dni');
  }
}
