<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameTable extends Migration
{
    public function up()
    {
        Schema::create('game', function (Blueprint $table) {

            $table->integer('id',);
            $table->integer('event_id',)->nullable();
            $table->integer('home_team',);
            $table->integer('away_team',);
            $table->integer('home_score',)->nullable();
            $table->integer('away_score',)->nullable();
            $table->integer('status',)->nullable();
            $table->primary('id');
            $table->foreign('home_team')->references('id')->on('team');
            $table->foreign('away_team')->references('id')->on('team');
        });
    }

    public function down()
    {
        Schema::dropIfExists('game');
    }
}
