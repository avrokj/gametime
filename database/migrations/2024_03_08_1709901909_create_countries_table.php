<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {

            $table->integer('id',);
            $table->string('country_name', 45)->nullable();
            $table->string('flag')->nullable();
            $table->primary('id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('countries');
    }
}
