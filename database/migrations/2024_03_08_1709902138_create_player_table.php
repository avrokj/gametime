<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayerTable extends Migration
{
	public function up()
	{
		Schema::create('player', function (Blueprint $table) {

			$table->integer('id',);
			$table->string('player_name', 45)->nullable();
			$table->string('player_no', 45)->nullable();
			$table->date('birthdate')->nullable();
			$table->string('image')->nullable();
			$table->integer('team_id',);
			$table->integer('position_id',);
			$table->integer('country_id',);
			$table->timestamp('timestamp')->nullable();
			$table->primary(['id', 'team_id', 'position_id', 'country_id']);
			$table->foreign('team_id')->references('id')->on('team');
			$table->foreign('position_id')->references('id')->on('position');
			$table->foreign('country_id')->references('id')->on('country');
		});
	}

	public function down()
	{
		Schema::dropIfExists('player');
	}
}
