<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
    	"Name",
 		"Cert_ID",
	 	"Mobile",
	 	"Location",
	 	"Phone",
	 	"Email",
	 	"Address",
	 	"Description",
	 	"image",
	 	"Status",
    ];
}
