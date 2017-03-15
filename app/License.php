<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    public function getType()
    {
    	return $this->belongsTo('\App\LicenseType', 'type_id', 'id');
    }
}
