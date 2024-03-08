<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSportTable extends Migration
{
    public function up()
    {
        Schema::create('sport', function (Blueprint $table) {

		$table->integer('id',);
		$table->string('sports_name',45)->nullable();
		$table->primary('id');

        });
    }

    public function down()
    {
        Schema::dropIfExists('sport');
    }
}