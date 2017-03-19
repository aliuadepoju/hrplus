<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeoPolZone extends Model
{
    public function getStates()
    {
    	return $this->hasMany('\App\State', 'zone_id', 'id');
    }
}
