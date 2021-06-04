<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    // Run migration
    public function up()
    {
        // Create table products
        Schema::create('products', function (Blueprint $table) {
            // Add columns with $table property
            $table->id();
            $table->foreignId('category_id')
                ->constrained('product_categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('brand_id')
                ->constrained('brands')
                ->onUpdate('cascade')
                ->onDelete('cascade');;
            $table->string('name');
            $table->float('price');
            $table->unsignedInteger('stock');
            $table->string('image_path');
            $table->text('description');
            $table->text('features')->nullable();
            $table->boolean('status');
            $table->timestamps();
        });
    }

    // Reverse Migration
    public function down()
    {
        // Drop table products if exists
        Schema::dropIfExists('products');
    }
}