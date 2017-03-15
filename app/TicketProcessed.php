<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketProcessed extends Model
{
    public function getTicket()
    {
    	return $this->belongsTo('\App\Ticket', 'ticket_id', 'id');
    }

    public function getUser()
    {
    	return $this->belongsTo('\App\User', 'user_id', 'id');
    }

    public function getStat()
    {
    	return $this->belongsTo('\App\TicketStatus', 'ticket_status_id', 'id');
    }
}
