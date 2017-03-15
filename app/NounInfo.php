<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NounInfo extends Model
{
    public function getDept()
    {
    	return $this->belongsTo('\App\Department', 'department_id', 'id');
    }
    public function getUnit()
    {
        return $this->belongsTo('\App\Unit', 'unit_id', 'id');
    }

    public function getScale()
    {
        return $this->belongsTo('\App\SalaryScale', 'salary_scale_id', 'id');
    }

    public function getBranch()
    {
        return $this->belongsTo('\App\Branch', 'branch_id', 'id');
    }

    public function personnels()
    {
        return $this->hasMany('\App\Personnel', 'id', 'personnel_id');
    }

    public function getAppt()
    {
    	return $this->belongsTo('\App\Status', 'status_id', 'id');
    }
}
