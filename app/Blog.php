<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['page', 'page_title', 'page_description', 'page_keywords', 'image', 'content', 'index', 'facebook', 'google'];
}
