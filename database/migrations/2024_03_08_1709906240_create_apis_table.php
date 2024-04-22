<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApisTable extends Migration
{
    public function up()
    {
        Schema::create('apis', function (Blueprint $table) {

            $table->integer('id',);
            $table->integer('sb_id',);
            $table->string('last_command', 1)->nullable();
            $table->integer('home_score',)->nullable();
            $table->integer('away_score',)->nullable();
            $table->primary(['id', 'sb_id']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('apis');
    }
}
