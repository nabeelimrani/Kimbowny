<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  public function up()
  {
    Schema::create('color_product', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('color_id');
      $table->unsignedBigInteger('product_id');
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('product_color');
  }
};
