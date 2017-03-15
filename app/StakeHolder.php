<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StakeHolder extends Model
{
    public function tickets()
    {
    	return $this->hasMany('\App\TicketStakeHolder', 'stake_holder_id', 'id');
    }
}
