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
     Schema::create('order_product', function (Blueprint $table) {
       $table->id();
       $table->foreignId('order_id');
        $table->foreignId('product_id');
       $table->integer("quantity");
       $table->integer("sale");
       $table->integer("purchase");
       $table->integer("total");
       $table->string("item_color")->nullable();
       $table->string("item_size")->nullable();
     });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};