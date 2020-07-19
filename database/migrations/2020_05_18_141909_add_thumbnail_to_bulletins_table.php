<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddThumbnailToBulletinsTable extends Migration
{
    

    public function up()
    {
        Schema::table('bulletins', function (Blueprint $table) {
            $table->string('thumbnail')->nullable();
        });
    }

   
    public function down()
    {
        Schema::table('bulletins', function (Blueprint $table) {
            //
        });
    }
}
