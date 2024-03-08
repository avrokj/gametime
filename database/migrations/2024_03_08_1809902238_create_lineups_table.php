<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLineupsTable extends Migration
{
	public function up()
	{
		Schema::create('lineups', function (Blueprint $table) {

			$table->integer('id',);
			$table->integer('game_id',);
			$table->integer('player_id',);
			$table->integer('player_team_id',);
			$table->integer('shot_id',);
			$table->integer('foul_id',);
			$table->integer('status',)->nullable();
			$table->timestamp('timestamp')->nullable();
			$table->primary(['id']);
			$table->foreign('game_id')->references('id')->on('games');
			$table->foreign('player_id')->references('id')->on('players');
			$table->foreign('shot_id')->references('id')->on('shots');
			$table->foreign('foul_id')->references('id')->on('fouls');
		});
	}

	public function down()
	{
		Schema::dropIfExists('lineups');
	}
}
