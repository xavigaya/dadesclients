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
      'nom', 'cognoms', 'dni',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'password', 'remember_token',
  ];
}
