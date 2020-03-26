<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmsRecivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sms__recives', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('inNumber');
            $table->string('sender');
            $table->string('keyword');
            $table->string('content');
            $table->string('email');
            $table->string('credits');
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
        Schema::dropIfExists('sms__recives');
    }
}
