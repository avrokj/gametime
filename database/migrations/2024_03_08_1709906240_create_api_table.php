<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApiTable extends Migration
{
    public function up()
    {
        Schema::create('api', function (Blueprint $table) {

            $table->integer('id',);
            $table->integer('sb_id',);
            $table->string('last_command', 1)->nullable();
            $table->integer('home_score',)->nullable();
            $table->integer('away_score',)->nullable();
            $table->primary(['id', 'sb_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('api');
    }
}
