<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('booking_code');
            $table->string('coupons_id')->nullable();
            $table->bigInteger('user_id');
            $table->bigInteger('event_id');
            $table->string('pay_option')->nullable();
            $table->double('amount')->nullable();
            $table->string('slots')->nullable();
            $table->string('paymentReceipt')->nullable();
            $table->string('status');
            $table->string('names')->nullable();
            $table->string('title')->nullable();
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
        Schema::dropIfExists('bookings');
    }
}
