<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_details',function(Blueprint $table){
            $table->increments('id');
            $table->string('event_id');
            $table->foreign('event_id')->references('event_id')->on('events');
            $table->string('event_name');
            $table->string('event_description',1000);
            $table->string('1st_place')->nullable();
            $table->string('2nd_place')->nullable();
            $table->string('3rd_place')->nullable();
            $table->datetime('timing');
            $table->string('rules',1000);
            $table->remembertoken();
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
        Schema::drop('event_details');
    }
}
