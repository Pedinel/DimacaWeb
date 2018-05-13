<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasedArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchased_articles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('purchase_id');
            $table->unsignedInteger('article_id');
            $table->unsignedInteger('article_lot_id');
            $table->integer('quantity');
            $table->bigInteger('unit_price_subtotal');
            $table->bigInteger('unit_price_iva');
            $table->bigInteger('unit_price_total');
            $table->integer('iva_prc');
            $table->bigInteger('price_subtotal');
            $table->bigInteger('price_iva');
            $table->bigInteger('price_total');
            $table->date('expires_at');

            $table->foreign('purchase_id')->references('id')->on('purchases');
            $table->foreign('article_lot_id')->references('id')->on('article_lots');

            $table->index('purchase_id');
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
        Schema::dropIfExists('purchased_articles');
    }
}
