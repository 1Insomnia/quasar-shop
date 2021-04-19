<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBrandsStatus extends Migration
{
    public function up()
    {
        Schema::table('brands', function (Blueprint $table) {
            $table->boolean('status')->default(1);
        });
    }

    public function down()
    {
        Schema::table('', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
