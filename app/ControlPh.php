<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ControlPh extends Model
{
    public $timestamps = false;
    protected $fillable = ['Data', 'Ph1', 'Cond1', 'Temp1', 'Ph2', 'Cond2', 'Temp2', 'Ph3', 'Cond3', 'Temp3', 'Ph0', 'Cond0', 'Temp0'];
}
