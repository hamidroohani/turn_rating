<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Turns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turns', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('time_id')->unsigned();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('meli_code');
            $table->string('father')->nullable();
            $table->string('mobile_num');
            $table->string('phone_num')->nullable();
            $table->string('bime');
            $table->string('time_s');
            $table->string('trace_code');
            $table->timestamps();

            $table->foreign('time_id')->references('id')->on("times")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('turns');
    }
}
