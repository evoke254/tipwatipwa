<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function getTrainer()
    {
    	return $this->belongsTo('App\User', 'trainer', 'id');
    }
    
    public function getClass()
    {
    	return $this->belongsTo('App\Service', 'services_id', 'id');
    }
    
    public function getBookings()
    {
    	return $this->hasMany('App\Booking', 'event_id', 'id');
    }
}
