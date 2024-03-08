<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountryTable extends Migration
{
    public function up()
    {
        Schema::create('country', function (Blueprint $table) {

            $table->integer('id',);
            $table->string('country_name', 45)->nullable();
            $table->string('flag')->nullable();
            $table->primary('id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('country');
    }
}
