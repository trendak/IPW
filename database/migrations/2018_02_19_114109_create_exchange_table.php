<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExchangeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exchange', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('status')->default('0');
            $table->integer('item_id')->unsigned();
            $table->integer('prop_item_id')->unsigned();
              $table->integer('item_status')->unsigned()->default('1');
            $table->integer('prop_item_status')->unsigned()->default('1');
            $table->timestamps();
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
            $table->foreign('prop_item_id')->references('id')->on('items')->onDelete('cascade');
               $table->foreign('item_status')->references('id')->on('statusexchange');
            $table->foreign('prop_item_status')->references('id')->on('statusexchange');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exchange');
    }
}
