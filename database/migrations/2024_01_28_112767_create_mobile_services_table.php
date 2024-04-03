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
        Schema::create('mobile_services', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('job_number')->unique();

            $table->unsignedBigInteger('job_type_id')->unsigned()->index()->nullable();
            $table->foreign('job_type_id')->references('id')->on('job_types')->onDelete('cascade');

            $table->string('contact_name')->nullable();
            $table->string('contact_number')->nullable();
            $table->text('contact_address')->nullable();


            $table->string('imei');
            $table->string('lock')->nullable();

            $table->unsignedBigInteger('mobile_model_id')->unsigned()->index()->nullable();
            $table->foreign('mobile_model_id')->references('id')->on('mobile_models')->onDelete('cascade');

            $table->unsignedBigInteger('mobile_complaint_id')->unsigned()->index()->nullable();
            $table->foreign('mobile_complaint_id')->references('id')->on('mobile_complaints')->onDelete('cascade');

            $table->text('complaint_details')->nullable();
            $table->text('work_details')->nullable();
            $table->date('delivered_at')->nullable();

            $table->unsignedBigInteger('work_status_id')->unsigned()->index()->nullable();
            $table->foreign('work_status_id')->references('id')->on('work_statuses')->onDelete('cascade');

            $table->unsignedBigInteger('job_status_id')->unsigned()->index()->nullable();
            $table->foreign('job_status_id')->references('id')->on('job_statuses')->onDelete('cascade');

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
        Schema::dropIfExists('mobile_services');
    }
};
