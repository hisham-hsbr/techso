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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('local_name')->nullable();
            $table->string('contact_name');
            $table->string('phone_1')->unique();
            $table->string('phone_2')->nullable();
            $table->string('address')->nullable();

            $table->unsignedBigInteger('customer_type_id')->unsigned()->index()->nullable();
            $table->foreign('customer_type_id')->references('id')->on('customer_types')->onDelete('cascade');

            $table->unsignedBigInteger('promotion_type_id')->unsigned()->index()->nullable();
            $table->foreign('promotion_type_id')->references('id')->on('promotion_types')->onDelete('cascade');

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
        Schema::dropIfExists('customers');
    }
};
