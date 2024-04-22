<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoulsTable extends Migration
{
    public function up()
    {
        Schema::create('fouls', function (Blueprint $table) {

            $table->integer('id',);
            $table->integer('game_id',);
            $table->integer('player_id1',);
            $table->integer('player_team_id',);
            $table->primary(['id', 'game_id', 'player_id1', 'player_team_id']);
            $table->foreign('game_id')->references('id')->on('games');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fouls');
    }
}
