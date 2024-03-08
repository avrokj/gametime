<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoachTable extends Migration
{
    public function up()
    {
        Schema::create('coach', function (Blueprint $table) {

            $table->integer('id',);
            $table->string('coach_name', 45)->nullable();
            $table->string('image')->nullable();
            $table->integer('country_id',);
            $table->primary(['id', 'country_id']);
            $table->foreign('country_id')->references('id')->on('country');
        });
    }

    public function down()
    {
        Schema::dropIfExists('coach');
    }
}
