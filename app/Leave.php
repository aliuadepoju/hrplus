<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    public function getParent()
    {
    	return $this->belongsTo('\App\LeaveType', 'leave_type_id', 'id');
    }

    public function getPersonnel()
    {
    	return $this->belongsTo('\App\Personnel', 'personnel_id', 'id');
    }
}
