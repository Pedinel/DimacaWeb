<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('payment_type_id');
            $table->unsignedInteger('client_id');
            $table->string('dni', 16);
            $table->string('name', 64);
            $table->string('target', 32);
            $table->string('account_number', 32);
            $table->string('account_type', 16);
            $table->string('email', 32);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('payment_type_id')->references('id')->on('payment_types');

            $table->index(['client_id', 'deleted_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_methods');
    }
}
