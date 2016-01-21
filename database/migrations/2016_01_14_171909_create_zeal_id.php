<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZealId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zeal_id',function(Blueprint $table){
            $table->increments('id');
            $table->string('email');
            $table->foreign('email')->references('email')->on('users');
            $table->string('zealid');
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
        Schema::drop('zeal_id');
    }
}
