<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressVenueEventTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->float('lat');
            $table->float('lng');
            $table->string('address');
            $table->string('note');
            $table->timestamps();
        });
        Schema::create('venues', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
            $table->unsignedInteger('address_id');
            $table->foreign('address_id')->references('id')->on('addresses');
        });
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('subtitle');
            $table->dateTime('startTime');
            $table->dateTime('endTime');
            $table->string('description');
            $table->timestamps();
            $table->unsignedInteger('venue_id');
            $table->foreign('venue_id')->references('id')->on('venues');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Address');
    }
}
