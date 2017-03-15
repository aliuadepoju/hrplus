<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalaryScale extends Model
{
    public function getPersonnel()
    {
    	return $this->hasMany('\App\NounInfo', 'salary_scale_id', 'id' );
    }

    public function getParent()
    {
    	return $this->belongsTo('\App\SalaryScaleCategory', 'salary_scale_category_id', 'id');
    }
}
