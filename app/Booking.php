<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
     public function getClassEvent()
    {
    	return $this->belongsTo('App\Event', 'event_id');
    }
    public function getUser()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }
}
