<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsingRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('using_records'))
        {
        Schema::create('using_records', function (Blueprint $table) {
            $table->id();
            $table->string('device_id',100);
            $table->text('message',50);
            $table->string('app_usage_time',10);
            $table->string('exp_usage_time',100);
            $table->string('puase_button',60);
            $table->string('info_button',60);
            $table->string('play_button',60);
            $table->string('allowed',5);

            $table->timestamps();
        });
    }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('using_records');
    }
}
