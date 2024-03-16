<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSportsTable extends Migration
{
    public function up()
    {
        Schema::create('sports', function (Blueprint $table) {

            $table->integer('id',);
            $table->string('sports_name', 45)->nullable();
            $table->timestamps();
            $table->primary('id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('sports');
    }
}
