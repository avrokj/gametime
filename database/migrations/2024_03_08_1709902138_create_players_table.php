<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
	public function up()
	{
		Schema::create('players', function (Blueprint $table) {

			$table->integer('id',);
			$table->string('player_name', 45)->nullable();
			$table->string('player_no', 45)->nullable();
			$table->date('dob')->nullable();
			$table->string('image')->nullable();
			$table->integer('team_id',);
			$table->integer('position_id',);
			$table->integer('country_id',);
			$table->timestamp('timestamp')->nullable();
			$table->primary(['id', 'team_id', 'position_id', 'country_id']);
			$table->foreign('team_id')->references('id')->on('teams');
			$table->foreign('position_id')->references('id')->on('positions');
			$table->foreign('country_id')->references('id')->on('countries');
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('players');
	}
}
