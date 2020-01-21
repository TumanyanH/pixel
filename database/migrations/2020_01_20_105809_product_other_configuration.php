<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductOtherConfiguration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_other_configurations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id')->default(0);
            $table->unsignedInteger('color_id')->default(0);
            $table->integer('price')->nullable();
            $table->integer('sale_price')->nullable();
            $table->integer('sale_discount')->nullable();
            $table->integer('in_stock')->nullable();
            $table->timestamps();
        });

        Schema::table('product_other_configurations', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('color_id')->references('id')->on('product_color_details')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
