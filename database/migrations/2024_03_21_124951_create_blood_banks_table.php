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
        Schema::create('blood_banks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('last_name')->nullable();
            $table->date('dob')->nullable();
            $table->string('phone1')->unique();
            $table->string('phone2')->nullable();
            $table->string('gender')->nullable();
            $table->string('email')->unique();
            $table->date('last_donated_at')->unique();
            $table->boolean('contact_only_admin')->nullable();
            $table->string('description')->nullable();
            $table->boolean('status')->nullable();

            $table->unsignedBigInteger('city_id')->unsigned()->index()->nullable();
            $table->foreign('city_id')->references('id')->on('country_state_district_cities')->onDelete('cascade');

            $table->unsignedBigInteger('blood_id')->unsigned()->index()->nullable();
            $table->foreign('blood_id')->references('id')->on('bloods')->onDelete('cascade');

            // default
            $table->unsignedBigInteger('created_by')->unsigned()->index()->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('updated_by')->unsigned()->index()->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blood_banks');
    }
};
