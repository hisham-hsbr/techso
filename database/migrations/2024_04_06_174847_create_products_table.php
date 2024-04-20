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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('name');
            $table->string('product_barcode_1')->nullable();
            $table->string('product_barcode_2')->nullable();
            $table->string('local_name')->nullable();

            $table->unsignedBigInteger('product_type_id')->unsigned()->index()->nullable();
            $table->foreign('product_type_id')->references('id')->on('product_types')->onDelete('cascade');

            $table->unsignedBigInteger('brand_id')->unsigned()->index()->nullable();
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');

            $table->string('description')->nullable();
            $table->string('edit_description')->nullable();
            $table->boolean('status')->nullable();

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
        Schema::dropIfExists('products');
    }
};
