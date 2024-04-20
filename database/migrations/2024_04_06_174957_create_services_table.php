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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('job_number')->unique();

            $table->unsignedBigInteger('job_type_id')->unsigned()->index()->nullable();
            $table->foreign('job_type_id')->references('id')->on('job_types')->onDelete('cascade');

            $table->unsignedBigInteger('customer_id')->unsigned()->index()->nullable();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');

            $table->unsignedBigInteger('product_id')->unsigned()->index()->nullable();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

            $table->string('serial_number')->nullable();
            $table->text('customer_accessories');
            $table->string('lock')->nullable();

            $table->unsignedBigInteger('complaint_id')->unsigned()->index()->nullable();
            $table->foreign('complaint_id')->references('id')->on('complaints')->onDelete('cascade');

            $table->string('complaint_details')->nullable();

            $table->unsignedBigInteger('work_status_id')->unsigned()->index()->nullable();
            $table->foreign('work_status_id')->references('id')->on('work_statuses')->onDelete('cascade');

            $table->string('work_status_details')->nullable();

            $table->unsignedBigInteger('job_status_id')->unsigned()->index()->nullable();
            $table->foreign('job_status_id')->references('id')->on('job_statuses')->onDelete('cascade');

            $table->string('job_status_details')->nullable();

            $table->unsignedBigInteger('customer_accessories_id')->unsigned()->index()->nullable();
            $table->foreign('customer_accessories_id')->references('id')->on('customer_accessories')->onDelete('cascade');

            $table->date('delivered_date')->nullable();
            $table->decimal('payment', 15, 2)->nullable();
            $table->decimal('advance', 15, 2)->nullable();
            $table->decimal('balance', 15, 2)->nullable();

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
        Schema::dropIfExists('services');
    }
};
