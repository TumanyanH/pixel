<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductColorDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_color_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id')->default();
            $table->string('color')->nullable();
            $table->string('color_name')->nullable();
            $table->string('color_image')->nullable();
            $table->timestamps();
        });

        Schema::table('product_color_details', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_color_details');
    }
}
