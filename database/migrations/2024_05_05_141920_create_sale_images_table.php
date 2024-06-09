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
        Schema::create('sale_images', function (Blueprint $table) {
            $table->id();

            $table->string('url');
            $table->string('image_details')->nullable();

            $table->unsignedBigInteger('sale_id')->unsigned()->index()->nullable();
            $table->foreign('sale_id')->references('id')->on('sales')->onDelete('cascade');

            $table->unsignedBigInteger('product_attribute_id')->unsigned()->index()->nullable();
            $table->foreign('product_attribute_id')->references('id')->on('product_attributes')->onDelete('cascade');

            $table->boolean('status')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale_images');
    }
};
