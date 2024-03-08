<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
	public function up()
	{
		Schema::create('events', function (Blueprint $table) {

			$table->integer('id',);
			$table->string('event_name', 45)->nullable();
			$table->string('location', 45)->nullable();
			$table->datetime('datetime')->nullable();
			$table->integer('sport_id',);
			$table->integer('game_id',);
			$table->integer('country_id',);
			$table->integer('arena_id',);
			$table->integer('arena_country_id',);
			$table->primary(['id', 'sport_id', 'game_id']);
			$table->foreign('sport_id')->references('id')->on('sports');
			$table->foreign('game_id')->references('id')->on('games');
			$table->foreign('country_id')->references('id')->on('countries');
			$table->foreign('arena_id')->references('id')->on('arenas');
		});
	}

	public function down()
	{
		Schema::dropIfExists('events');
	}
}
