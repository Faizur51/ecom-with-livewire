<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->longText('short_description')->nullable();
            $table->longText('long_description')->nullable();
            $table->string('sku_code')->nullable();
            $table->string('stock_status')->default('1');
            $table->decimal('regular_price',8,2)->nullable();
            $table->decimal('sale_price',8,2)->nullable();
            $table->unsignedInteger('quantity')->nullable();
            $table->string('color')->default('[]');
            $table->string('size')->default('[]');
            $table->string('image')->nullable();
            $table->text('images')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('subcategory_id')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->cascadeOnDelete();
            $table->foreign('subcategory_id')->references('id')->on('subcategories')->cascadeOnDelete();
            $table->foreign('brand_id')->references('id')->on('brands')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
