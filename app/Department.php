<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function getNOUNInfo()
    {
    	return $this->hasMany('\App\NounInfo', 'department_id', 'id');
    }

    public function getBranch()
    {
    	return $this->belongsTo('\App\Branch', 'branch_id', 'id');
    }

    public function getUnits()
    {
    	return $this->hasMany('\App\Unit', 'department_id', 'id');
    }
    
}
