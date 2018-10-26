<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->text('description');
            $table->integer('society_id')->unsigned();
            $table->integer('winner1', false, true)->length(11);
            $table->integer('winner2', false, true)->length(11)->nullable();
            $table->string('contact_name', 100);
            $table->integer('contact_no', false, true)->length(10);
            $table->boolean('is_active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
