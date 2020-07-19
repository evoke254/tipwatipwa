<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aboutitem extends Model
{   
    protected $fillable = ['page_title', 'page_description', 'page_keywords', 'options', 'image', 'content', 'index', 'facebook', 'google'];
}