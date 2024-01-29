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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->text("description");
            $table->integer("quantity");
            $table->decimal("sale", 10, 2);
            $table->decimal("purchase", 10, 2);
            $table->foreignId("brand_id");
            $table->foreignId("pet_id");
            $table->foreignId("category_id");
            $table->boolean("feature")->default(0);
            $table->string("photo");
            $table->string("discount")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
