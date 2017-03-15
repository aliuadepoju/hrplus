<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketStakeHolder extends Model
{
    public function getStakeholder()
    {
    	return $this->belongsTo('\App\StakeHolder', 'stake_holder_id', 'id');
    }

    public function getTicket()
    {
    	return $this->belongsTo('\App\Ticket', 'ticket_id', 'id');
    }
}
