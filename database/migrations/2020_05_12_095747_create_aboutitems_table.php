<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aboutitems', function (Blueprint $table) {
            $table->id();
            $table->string('page_title')->nullable();
            $table->string('page_description')->nullable();
            $table->string('page_keywords')->nullable();
            $table->string('options')->nullable();
            $table->text('content')->nullable();
            $table->string('image')->nullable();
            $table->boolean('index')->default(0);
            $table->string('facebook')->nullable();
            $table->string('google')->nullable();
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
        Schema::dropIfExists('aboutitems');
    }
}
