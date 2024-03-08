<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePositionsTable extends Migration
{
    public function up()
    {
        Schema::create('positions', function (Blueprint $table) {

            $table->integer('id',);
            $table->string('position', 45)->nullable();
            $table->primary('id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('positions');
    }
}
