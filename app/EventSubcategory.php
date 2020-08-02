<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventSubcategory extends Model
{

    protected $table ='events_subcategory';
    protected $guarded =[];
    public function category()
    {
        return $this->belongsTo(EventCategory::class,'category_id','id');
    }
}
