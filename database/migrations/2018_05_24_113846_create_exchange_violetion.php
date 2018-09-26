<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExchangeVioletion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exchange_violations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_exchange')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('description');
            $table->foreign('id_exchange')->references('id')->on('exchange');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('exchange_ciolations');
    }
}
