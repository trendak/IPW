<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('title');
            $table->integer('shipping')->unsigned();
            $table->string('description');
            $table->string('image_url');
            $table->string('status')->default('1');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('shipping')->references('id')->on('shipping_method');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
