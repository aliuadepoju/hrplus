<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public function getPersonnel()
    {
    	return $this->hasMany('\App\Personnel', 'state_id', 'id');
    }

    public function staffInState()
    {
        return $this->getPersonnel()->where('state_id', '!=', $this->id);
        // $stInSt = \App\NounInfo::where('state_id', $this->id);
    }

    public function maxEmployee()
    {
        $mEmp = \App\Personnel::where('state_id', $this->id)->groupBy('state_id')->orderBy('state_id', 'DESC')->get();
        dd($mEmp);
        return $mEmp;

      // return $stEmp = \DB::table('personnels')->count('state_id')->where('state_id', $this->id)->get();

      return $stEmp = \DB::table('personnels')
                     ->select(\DB::raw('count(state_id) as prsn_count, status'))
                     ->where('status', '<>', 1)
                     ->groupBy('state_id')
                     ->get();
    }

    public function getMax()
    {
         $max = \DB::table('states')
            ->leftJoin('personnels', 'states.id', '=', 'personnels.state_id')
            ->groupBy('state_id')
            ->get();
        return $max;
    }

    public function getBranches()
    {
        return $this->hasMany('\App\Branch', 'state_id', 'id');
    }

    public function getLgas()
    {
        return $this->hasMany('\App\Lga', 'id', 'state_id');
    }

    public function getProfs()
    {
        return $this->getPersonnel()->where('title', '=', 1)->get();
    }

    public function getProfsInState()
    {
        # code...
    }

    public function getDrs()
    {
        # code...
    }

    public function getDrsInState()
    {
        # code...
    }

    public function getMasters()
    {
        # code...
    }

    public function getMastersInState()
    {
        # code...
    }

    public function getDegrees()
    {
        # code...
    }

    public function getDegreesInState()
    {
        # code...
    }

    public function getSSCE()
    {
        # code...
    }

    public function getSSCEInState()
    {
        # code...
    }

    public function getZone()
    {
        return $this->belongsTo('\App\GeoPolZone', 'zone_id', 'id');
    }



    


}
