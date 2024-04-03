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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('city_id')->unsigned()->index()->nullable();
            $table->foreign('city_id')->references('id')->on('country_state_district_cities')->onDelete('cascade');

            $table->unsignedBigInteger('blood_id')->unsigned()->index()->nullable();
            $table->foreign('blood_id')->references('id')->on('bloods')->onDelete('cascade');

            $table->unsignedBigInteger('time_zone_id')->unsigned()->index()->nullable();
            $table->foreign('time_zone_id')->references('id')->on('time_zones')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn(('city_id'));
            $table->dropColumn(('blood_id'));
            $table->dropColumn(('time_zone_id'));
        });
    }
};
