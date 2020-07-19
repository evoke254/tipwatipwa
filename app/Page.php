<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['page_title', 'page_description', 'page_keywords', 'image', 'content', 'index', 'facebook', 'google'];
}
