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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('list_number')->unique();

            $table->unsignedBigInteger('product_id')->unsigned()->index()->nullable();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

            $table->string('purchase_rate', 15, 2)->nullable();
            $table->string('added_rate', 15, 2)->nullable();
            $table->decimal('payment', 15, 2)->nullable();
            $table->text('settings');

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
        Schema::dropIfExists('sales');
    }
};
