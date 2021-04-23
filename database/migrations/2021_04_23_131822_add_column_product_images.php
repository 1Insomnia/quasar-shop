<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnProductImages extends Migration
{
    public function up()
    {
        Schema::table('product_images', function (Blueprint $table) {
            $table->string('image_path')->unique()->change();
        });
    }

    public function down()
    {
        Schema::table('', function (Blueprint $table) {
        });
    }
}
