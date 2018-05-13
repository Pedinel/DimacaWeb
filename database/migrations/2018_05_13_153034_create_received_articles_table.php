<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceivedArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('received_articles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('purchase_id');
            $table->unsignedInteger('purchased_article_id');
            $table->unsignedInteger('article_id');
            $table->unsignedInteger('article_lot_id');
            $table->integer('quantity_before');
            $table->integer('quantity_received');
            $table->integer('quantity_after');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('purchase_id')->references('id')->on('purchases');
            $table->foreign('purchased_article_id')->references('id')->on('purchased_articles');
            $table->foreign('article_id')->references('id')->on('articles');
            $table->foreign('article_lot_id')->references('id')->on('article_lots');

            $table->index('user_id');
            $table->index('purchase_id');
            $table->index('purchased_article_id');
            $table->index('article_id');
            $table->index('article_lot_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('received_articles');
    }
}
