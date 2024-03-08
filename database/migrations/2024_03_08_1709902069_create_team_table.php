<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamTable extends Migration
{
    public function up()
    {
        Schema::create('team', function (Blueprint $table) {

            $table->integer('id',);
            $table->string('team_name', 100)->nullable();
            $table->string('logo')->nullable();
            $table->integer('sport_id',);
            $table->integer('coach_id',);
            $table->primary(['id', 'sport_id', 'coach_id']);
            $table->foreign('sport_id')->references('id')->on('sport');
            $table->foreign('coach_id')->references('id')->on('coach');
        });
    }

    public function down()
    {
        Schema::dropIfExists('team');
    }
}
