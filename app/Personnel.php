<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
   	public function getState()
   	{
   		return $this->belongsTo('\App\State', 'state_id', 'id');
   	}

   	public function getLga()
   	{
      return $this->belongsTo('\App\Lga', 'lga_id', 'id');
    }

    public function getSalaryScale()
    {
      $sC = \App\NounInfo::where('status', '!=', 0)->get('salary_scale_id');
      return $sC; 
      // return $this->hasOne('\App\SalaryScale', 'id', 'personnel_id');
      // return $this->belongsTo('\App\SalaryScale', 'salary_scale_id', 'id');
    }

    public function getNOUNInfos()
    {
      return $this->hasOne('\App\NounInfo', 'personnel_id', 'id');
    }

    public function seniorStaff()
    {
      return $this->hasOne('\App\NounInfo', 'personnel_id', 'id')->where('salary_scale_id', '<=', 20);
    }

    public function getBranch()
    {
   		return $this->belongsTo('\App\Branch', 'branch_id', 'id');
      # code...
    }

    public function maxStates()
    {
      $mS = \App\State::where('id', $this->state_id)->orderBy('state', 'DESC')->get()->take(5);
      return $mS;
      // return $this->hasMany('\App\Lga', 'id', 'state_id');
    }

    public function minStates()
    {
        $this::where('', 'id', 'state_id');
      // return $this->hasMany('\App\Lga', 'id', 'state_id');
    }

    public function getLeaves()
    {
      return $this->hasMany('\App\Leave', 'personnel_id', 'id');
    }

    public function getDocuments()
    {
      return $this->hasMany('\App\Document', 'personnel_id', 'id');
    }

    public function getQuals()
    {
      return $this->hasMany('\App\PersonnelQualificationInfo', 'personnel_id', 'id');
    }

    public function getPromotions()
    {
      return $this->hasMany('\App\PersonnelPromotionInfo', 'personnel_id', 'id');
    }

}
