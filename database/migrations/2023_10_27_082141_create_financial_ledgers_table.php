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
        Schema::create('financial_ledgers', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('voucher_number');

            $table->unsignedBigInteger('voucher_type_id')->unsigned()->index()->nullable();
            $table->foreign('voucher_type_id')->references('id')->on('voucher_types')->onDelete('cascade');

            $table->unsignedBigInteger('account_id')->unsigned()->index()->nullable();
            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');

            $table->DECIMAL('debit', 15, 2)->nullable();
            $table->DECIMAL('credit', 15, 2)->nullable();
            $table->DECIMAL('Balance', 15, 2)->nullable();

            $table->string('narration')->nullable();
            $table->string('line_narration')->nullable();
            $table->string('remarks')->nullable();
            $table->string('line_remarks')->nullable();
            $table->string('bill_reference')->nullable();
            $table->string('reference')->nullable();
            $table->string('supplier_invoice')->nullable();


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
        Schema::dropIfExists('financial_ledgers');
    }
};
