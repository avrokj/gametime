<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShotsTable extends Migration
{
    public function up()
    {
        Schema::create('shots', function (Blueprint $table) {

            $table->integer('id',);
            $table->integer('game_id',);
            $table->integer('points',)->nullable();
            $table->timestamp('timestamp')->nullable();
            $table->primary(['id', 'game_id']);
            $table->foreign('game_id')->references('id')->on('games');
        });
    }

    public function down()
    {
        Schema::dropIfExists('shots');
    }
}
