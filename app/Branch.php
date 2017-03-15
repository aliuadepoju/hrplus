<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    public function getDepts()
    {
    	return $this->hasMany('\App\Department', 'branch_id', 'id');
    }

    public function getState()
    {
    	return $this->belongsTo('\App\State', 'state_id', 'id');
    }

    public function getCordinator()
    {
        return $this->hasMany('\App\NounInfo', 'personnel_id', 'id');
    }

    public function getStaff()
    {
        return $this->hasMany('\App\NounInfo', 'branch_id', 'id');
    }

    public function NounInfos()
    {
        return $this->hasMany('\App\NounInfo', 'branch_id', 'id');
    }

    public function personnel()
    {
        // $results = \DB::table('branches')
        //             ->join('noun_infos', 'noun_infos.branch_id', '=', $this->id)
        //             ->join('personnels', 'noun_infos.personnel_id', '=', 'personnels.id')
        //             ->select('personnels.*',
        //                     'personnels.surname AS sName',
        //                     'personnels.middle_name AS mName',
        //                     'personnels.first_name AS fName',
        //                     'branches.*',
        //                     'branches.branch_name AS bName')
        //             ->where('noun_infos.branch_id', $this->id)
        //             ->where('noun_infos.personnel_id','=', 'personnels.id')
        //             ->get();
       
    	// return $this->hasMany('\App\NounInfo', 'personnel_id', 'id');
    }
}
