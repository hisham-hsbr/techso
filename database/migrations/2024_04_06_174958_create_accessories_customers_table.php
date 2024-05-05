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
        Schema::create('accessories_customers', function (Blueprint $table) {
            // $table->id();
            $table->unsignedBigInteger('service_id')->unsigned()->index()->nullable();
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');

            $table->unsignedBigInteger('customer_accessories_id')->unsigned()->index()->nullable();
            $table->foreign('customer_accessories_id')->references('id')->on('customer_accessories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accessories_customers');
    }
};
