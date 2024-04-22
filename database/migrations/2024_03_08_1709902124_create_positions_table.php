<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePositionsTable extends Migration
{
    public function up()
    {
        Schema::create('positions', function (Blueprint $table) {

            $table->integer('id',);
            $table->string('position_name', 45)->nullable();
            $table->integer('sport_id',);
            $table->foreign('sport_id')->references('id')->on('sports');
            $table->primary('id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('positions');
    }
}
