<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
   public function getStatus()
   {
      return $this->hasOne('\App\TicketStatus', 'id', 'status');
   }

   public function getCreator()
   {
      return $this->belongsTo('\App\User', 'user_id', 'id');
   }

   public function getAssignedUser()
   {
      return $this->belongsTo('\App\User', 'assigned_to', 'id');
   }
   public function getAssignedBy()
   {
      return $this->belongsTo('\App\User', 'assigned_by', 'id');
   }

   public function getStakeholders()
   {
      return $this->hasMany('\App\TicketStakeHolder','ticket_id', 'id');
   }

   public function getCat()
   {
      return $this->belongsTo('\App\TicketCategory', 'category_id', 'id');
   }

   public function getProcesses()
   {
   	return $this->hasMany('\App\TicketProcessed','ticket_id', 'id');
   }

   public function isOverdue(){
      return $this->where('status', '=', '2');
      $_dateAssigned = $this->date_assigned;
      $_daysAllowed = $this->expected_days;

      $DT = new \DateTime($_dateAssigned);
      $DT = $DT->modify("+". $_daysAllowed . " days");
      
      return (time() > $DT);
   }
}
