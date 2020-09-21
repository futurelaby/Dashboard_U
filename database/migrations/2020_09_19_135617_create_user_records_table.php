<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('user_records')){
        Schema::create('user_records', function (Blueprint $table) {
            $table->id();
            $table->timestamp('create_account_date');
            $table->timestamp('verify_account_date');
            $table->timestamp('login_date');
            $table->string('passward' ,100);
            //$table->timestamps();
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
        Schema::dropIfExists('user_records');
    }
}
