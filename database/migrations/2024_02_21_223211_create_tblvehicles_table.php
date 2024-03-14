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
        Schema::create('tblvehicles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('vehicletitle');
            $table->string('selectbrand');
            $table->longText('textcomment');
            $table->integer('pricezone');
            $table->string('fueltype');
            $table->integer('yearofmfg');
            $table->integer('seatcapacity');
            $table->string('vimage1');
            $table->string('vimage2');
            $table->string('vimage3');
            $table->string('vimage4');
            $table->integer('airconditioner')->nullable();// Also gave default 0
            $table->integer('powerdoor')->nullable();
            $table->integer('antibraking')->nullable();
            $table->integer('brakeassist')->nullable();
            $table->integer('powersteering')->nullable();
            $table->integer('driverairbag')->nullable();
            $table->integer('passengerairbag')->nullable();
            $table->integer('powerwindow')->nullable();
            $table->integer('cdplayer')->nullable();
            $table->integer('centrallocking')->nullable();
            $table->integer('crashsensor')->nullable();
            

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblvehicles');
    }
};
