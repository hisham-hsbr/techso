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
        Schema::create('product_attributes', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('name');

            $table->unsignedBigInteger('product_attribute_type_id')->unsigned()->index()->nullable();
            $table->foreign('product_attribute_type_id')->references('id')->on('product_attribute_types')->onDelete('cascade');

            $table->string('local_name')->nullable();
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
        Schema::dropIfExists('product_attributes');
    }
};
