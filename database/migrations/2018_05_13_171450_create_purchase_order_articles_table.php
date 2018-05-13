<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseOrderArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_order_articles', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('purchase_order_id');
            $table->bigInteger('article_id');
            $table->integer('quantity');

            $table->foreign('purchase_order_id')->references('id')->on('purchase_orders');
            $table->foreign('article_id')->references('id')->on('articles');

            $table->index('purchase_order_id');
            $table->index('article_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_order_articles');
    }
}
