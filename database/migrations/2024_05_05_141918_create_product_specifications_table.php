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
        Schema::create('product_specifications', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('attribute_name');

            $table->unsignedBigInteger('second_sale_id')->unsigned()->index()->nullable();
            $table->foreign('second_sale_id')->references('id')->on('second_sales')->onDelete('cascade');

            $table->unsignedBigInteger('product_attribute_id')->unsigned()->index()->nullable();
            $table->foreign('product_attribute_id')->references('id')->on('product_attributes')->onDelete('cascade');

            $table->string('attribute_details')->nullable();

            $table->string('local_name')->nullable();
            $table->string('description')->nullable();
            $table->string('edit_description')->nullable();
            $table->boolean('status')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_specifications');
    }
};
