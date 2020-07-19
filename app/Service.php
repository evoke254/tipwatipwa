<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
        protected $fillable = ['title', 'desc', 'picture_1', 'picture_2', 'picture_3'];
}
