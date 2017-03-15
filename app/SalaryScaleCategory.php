<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalaryScaleCategory extends Model
{
    public function getScales()
    {
    	return $this->hasMany('\App\SalaryScale', 'salary_scale_category_id', 'id');
    }
}
