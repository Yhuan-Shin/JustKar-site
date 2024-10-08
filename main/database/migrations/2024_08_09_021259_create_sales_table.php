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
            $table->string('ref_no');
            $table->string('product_code');
            $table->string('product_name');
            $table->string('product_type');
            $table->string('brand');
            $table->string('category');
            $table->string('size');
            $table->string('quantity');
            $table->string('price');
            $table->string('total_price');
            $table->string('discount')->nullable();
            $table->string('cashier_name');
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
