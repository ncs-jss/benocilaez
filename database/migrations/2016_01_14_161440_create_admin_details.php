<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_details',function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
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
        Schema::drop('admin_details');
    }
}
