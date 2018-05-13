<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('client_id');
            $table->unsignedInteger('payment_method_id');
            $table->string('code', 16);
            $table->date('purchased_at');
            $table->date('received_at');
            $table->bigInteger('price_subtotal');
            $table->bigInteger('price_iva');
            $table->bigInteger('price_total');
            $table->bigInteger('payed_total');
            $table->boolean('in_debt');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods');

            $table->unique('code');
            $table->index('user_id');
            $table->index('client_id');
            $table->index('in_debt');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchases');
    }
}
