<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title')->nullable();
            $table->string('article_title')->nullable();

            $table->string('description_short')->nullable();
            $table->text('text')->nullable();

            $table->text('image')->nullable();

            $table->text('fb_link')->nullable();
            $table->text('inst_link')->nullable();
            $table->text('google_link')->nullable();
            $table->text('twit_link')->nullable();
            $table->text('web_link')->nullable();

            $table->string('meta_title');
            $table->text('meta_description');
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
        Schema::dropIfExists('partners');
    }
}
