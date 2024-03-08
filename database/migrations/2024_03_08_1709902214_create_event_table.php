<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventTable extends Migration
{
	public function up()
	{
		Schema::create('event', function (Blueprint $table) {

			$table->integer('id',);
			$table->string('event_name', 45)->nullable();
			$table->string('location', 45)->nullable();
			$table->datetime('datetime')->nullable();
			$table->integer('sport_id',);
			$table->integer('game_id',);
			$table->integer('country_id',);
			$table->integer('hall_id',);
			$table->integer('hall_country_id',);
			$table->primary(['id', 'sport_id', 'game_id']);
			$table->foreign('sport_id')->references('id')->on('sport');
			$table->foreign('game_id')->references('id')->on('game');
			$table->foreign('country_id')->references('id')->on('country');
			$table->foreign('hall_id')->references('id')->on('hall');
		});
	}

	public function down()
	{
		Schema::dropIfExists('event');
	}
}
