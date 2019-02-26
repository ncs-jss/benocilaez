<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->integer('society_id')->unsigned();
            $table->year('year');
            $table->integer('yr');
            $table->integer('branch_id')->unsigned();
            $table->string('email')->unique();
            $table->string('contact', 100);
            $table->integer('member_type_id')->unsigned();
            $table->string('zeal_id', 10);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member');
    }
}
