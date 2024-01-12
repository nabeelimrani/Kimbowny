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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->string("discount")->nullable();
            $table->string("_id")->nullable();
            $table->string("_status")->default('pending');
            $table->unsignedBigInteger("bill")->nullable();
            $table->boolean("status")->default(0);
            $table->text("note")->nullable();
            $table->string("courier_no")->nullable();
            $table->string("courier_company_name")->nullable();
            $table->string("courier_link")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
