<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('positions', function (Blueprint $table) {
            // $table->bigInteger('sports_id')->unsigned()->index();
            // $table->foreign('sports_id')->references('id')->on('sports')->onDelete('cascade');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('positions', function (Blueprint $table) {
            // $table->dropForeign(['sports_id']);
            // $table->dropColumn('sports_id');
            // $table->dropTimestamps();
        });
    }
};
