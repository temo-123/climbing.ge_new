<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutdoorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outdoors', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title')->nullable();
            $table->string('article_title')->nullable();

            $table->string('description_short')->nullable();
            $table->text('text')->nullable();

            $table->text('image')->nullable();
            $table->text('map')->nullable();
            
            $table->text('route')->nullable();
            $table->text('how_get')->nullable();
            $table->text('best_time')->nullable();
            $table->text('weather')->nullable();
            $table->text('what_need')->nullable();
            $table->text('info')->nullable();

            // $table->integer('bolder_route')->nullable();

            // $table->integer('a_4')->nullable();
            // $table->integer('a_5')->nullable();
            // $table->integer('b_5')->nullable();
            // $table->integer('c_5')->nullable();
            // $table->integer('a_6')->nullable();
            // $table->integer('b_6')->nullable();
            // $table->integer('c_6')->nullable();
            // $table->integer('a_7')->nullable();
            // $table->integer('b_7')->nullable();
            // $table->integer('c_7')->nullable();
            // $table->integer('a_8')->nullable();
            // $table->integer('b_8')->nullable();
            // $table->integer('c_8')->nullable();
            // $table->integer('a_9')->nullable();
            // $table->integer('b_9')->nullable();
            // $table->integer('c_9')->nullable();
            
            $table->text('view_360')->nullable();

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
        Schema::dropIfExists('outdoors');
    }
}
