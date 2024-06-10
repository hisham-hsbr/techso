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
        Schema::create('product_transactions', function (Blueprint $table) {

            $table->id();
            $table->date('date');

            $table->unsignedBigInteger('voucher_type_id')->unsigned()->index()->nullable();
            $table->foreign('voucher_type_id')->references('id')->on('voucher_types')->onDelete('cascade');

            $table->unsignedBigInteger('purchase_register_id')->unsigned()->index()->nullable();
            $table->foreign('purchase_register_id')->references('id')->on('purchase_registers')->onDelete('cascade');

            $table->unsignedBigInteger('sale_register_id')->unsigned()->index()->nullable();
            $table->foreign('sale_register_id')->references('id')->on('sale_registers')->onDelete('cascade');

            $table->string('document_number');

            $table->unsignedBigInteger('account_id')->unsigned()->index()->nullable();
            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');

            $table->string('supplier_invoice')->nullable();

            $table->unsignedBigInteger('product_id')->unsigned()->index()->nullable();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

            $table->decimal('received_quantity', 15, 2)->nullable();
            $table->decimal('received_price', 15, 2)->nullable();
            $table->decimal('issued_quantity', 15, 2)->nullable();
            $table->decimal('issued_price', 15, 2)->nullable();

            $table->string('document_line_description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_transactions');
    }
};
