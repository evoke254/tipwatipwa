<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventCategory extends Model
{
    protected $table ='events_category';
    protected $guarded =[];
    public function SubCategories()
    {
        return $this->hasMany(EventSubcategory::class,'category_id');
    }
}
