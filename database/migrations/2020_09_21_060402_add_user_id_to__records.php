<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToRecords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_records', function (Blueprint $table) {
            $table->foreign('AppUser_id')->references('id')->on('app_users')->onDelete('cascade');
        });
        Schema::table('using_records', function (Blueprint $table) {
            $table->foreign('AppUser_id')->references('id')->on('app_users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_records', function (Blueprint $table) {
            $table->drop('AppUser_id');
        });
        Schema::table('using_records', function (Blueprint $table) {
            $table->drop('AppUser_id');
        });
    }
}
