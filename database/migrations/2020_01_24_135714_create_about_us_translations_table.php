<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutUsTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_us_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('language_id')->default(1);
            $table->string('imagename_main')->nullable();
            $table->string('imagename_1')->nullable();
            $table->string('imagename_2')->nullable();
            $table->string('imagename_3')->nullable();
            $table->string('title')->nullable();
            $table->text('content')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('about_us_translations');
    }
}
