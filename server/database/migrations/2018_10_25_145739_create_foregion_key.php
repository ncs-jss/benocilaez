<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForegionKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->foreign('society_id')->references('id')->on('society')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade');
        });
        Schema::table('member', function (Blueprint $table) {
            $table->foreign('society_id')->references('id')->on('society')->onDelete('cascade');
            $table->foreign('branch_id')->references('id')->on('branch')->onDelete('cascade');
            $table->foreign('member_type_id')->references('id')->on('member_type')->onDelete('cascade');
        });
        Schema::table('winners', function (Blueprint $table) {
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
        });
        Schema::table('files', function (Blueprint $table) {
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropForeign('events_society_id_foreign');
            $table->dropIndex('events_society_id_foreign');
            $table->dropForeign('events_category_id_foreign');
            $table->dropIndex('events_category_id_foreign');
        });
        Schema::table('member', function (Blueprint $table) {
            $table->dropForeign('member_society_id_foreign');
            $table->dropIndex('member_society_id_foreign');
            $table->dropForeign('member_branch_id_foreign');
            $table->dropIndex('member_branch_id_foreign');
            $table->dropForeign('member_member_type_id_foreign');
            $table->dropIndex('member_member_type_id_foreign');
        });
        Schema::table('winners', function (Blueprint $table) {
            $table->dropForeign('winners_event_id_foreign');
            $table->dropIndex('winners_event_id_foreign');
        });
        Schema::table('files', function (Blueprint $table) {
            $table->dropForeign('files_event_id_foreign');
            $table->dropIndex('files_event_id_foreign');
        });
    }
}
