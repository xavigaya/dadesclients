<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VistaPrePress extends Model
{
    public function getIdDadesFeines(){
        return $this->IdDadesFeines;
    }
}
