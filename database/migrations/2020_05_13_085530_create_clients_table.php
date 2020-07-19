<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('Name')->nullable();
            $table->string('Cert_ID')->nullable();
            $table->string('Mobile')->nullable(); 
            $table->string('Location')->nullable();
            $table->string('Phone')->nullable();
            $table->string('Email')->nullable();
            $table->string('Address')->nullable();
            $table->string('Description')->nullable();
            $table->string('image')->nullable();
            $table->string('Status')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
