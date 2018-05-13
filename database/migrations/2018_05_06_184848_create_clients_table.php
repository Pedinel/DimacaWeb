<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('type', 1);
            $table->unsignedBigInteger('dni');
            $table->string('name', 128);
            $table->string('address', 256);
            $table->string('phones', 64);
            $table->string('email', 64);
            $table->timestamps();

            $table->unique(['type', 'dni']);
            $table->index('name');
            $table->index('email');
            $table->index('phones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
