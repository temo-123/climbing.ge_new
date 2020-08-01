<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOthersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('others', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title')->nullable();
            $table->string('article_title')->nullable();

            $table->string('description_short', 225)->nullable();
            $table->text('text')->nullable();

            $table->text('image')->nullable();

            $table->string('slider_img_1')->nullable();
            $table->string('slider_img_2')->nullable();
            $table->string('slider_img_3')->nullable();
            $table->string('slider_img_4')->nullable();
            $table->string('slider_img_5')->nullable();

            $table->string('slider_title_1')->nullable();
            $table->string('slider_title_2')->nullable();
            $table->string('slider_title_3')->nullable();
            $table->string('slider_title_4')->nullable();
            $table->string('slider_title_5')->nullable();

            $table->text('slider_text_1')->nullable();
            $table->text('slider_text_2')->nullable();
            $table->text('slider_text_3')->nullable();
            $table->text('slider_text_4')->nullable();
            $table->text('slider_text_5')->nullable();

            $table->string('meta_title');
            $table->string('meta_description');
            $table->string('meta_keyword');

            $table->integer('published')->nullable();

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
        Schema::dropIfExists('others');
    }
}
