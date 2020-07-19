<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Sitemap\SitemapGenerator as Sitemap;

class SitemapGenerator extends Controller
{
    
    public function create()
    {
    	
        Sitemap::create('https://swiftpayafrica.com')->writeToFile(public_path('sitemap.xml'));
    }
}
