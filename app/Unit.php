<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    public function getDept()
    {
    	return $this->belongsTo('\App\Department', 'department_id', 'id');
    }

    public function getPersonnel()
    {
    	return $this->hasMany('\App\NounInfo', 'unit_id', 'id');
    }

    public function getTree()
    {
    	return "NVT-0001-00001-AB";
    }
}
