<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tblbookings', function (Blueprint $table) {
            $table->id();
            $table->string('payment_id');
            $table->string('payment_intent');
            $table->string('booking_id')->unique();
            $table->string('name');
            $table->string('email');
            $table->integer('vehicle_id');
            $table->string('vehicle_name');
            $table->bigInteger('mobile');
            $table->string('message');
            $table->date('date');
            $table->time('time');
            $table->integer('amount');
            $table->string('payment_status')->default('Incomplete');  
            $table->boolean('status')->default(0); //payment pending or not receive here// Also default 0
            $table->string('payment_method');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblbookings');
    }
};
