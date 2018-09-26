<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViolationOfItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('violation_of_items', function (Blueprint $table) {
            $table->increments('id');
             $table->integer('item_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('description');
            $table->foreign('item_id')->references('id')->on('items');
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
        Schema::dropIfExists('violation_of_items');
    }
}
