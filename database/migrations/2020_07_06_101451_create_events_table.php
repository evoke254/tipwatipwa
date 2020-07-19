<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('trainer')->nullable();
            $table->bigInteger('services_id')->nullable();
            $table->string('classOrEvent');
            $table->string('title');
            $table->string('code');
            $table->string('venue')->nullable();
            $table->longText('desc')->nullable();
            $table->double('cost')->nullable();
            $table->dateTime('start')->nullable();
            $table->dateTime('finish')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
