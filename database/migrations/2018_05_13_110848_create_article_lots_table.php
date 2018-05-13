<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleLotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_lots', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->unsignedInteger('article_id');
            $table->string('name', 16);
            $table->date('expires_at');
            $table->integer('quantity');
            $table->bigInteger('sell_price');
            $table->timestamps();

            $table->foreign('article_id')->references('id')->on('articles');

            $table->index('article_id', 'name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_lots');
    }
}
