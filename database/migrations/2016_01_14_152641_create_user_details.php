<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->tinyinteger('year');
            $table->string('college');
            $table->string('course');
            $table->string('contact',10);
            $table->string('email');
            $table->foreign('email')->references('email')->on('users');
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
        Schema::drop('user_details');
    }
}
