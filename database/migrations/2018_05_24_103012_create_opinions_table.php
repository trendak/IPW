<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpinionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opinions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_to_user')->unsigned();
            $table->integer('id_from_user')->unsigned();
            $table->integer('id_exchange')->unsigned();
            $table->string('description');
            $table->boolean('satisfaction');
            $table->timestamps();
             $table->foreign('id_to_user')->references('id')->on('users');
            $table->foreign('id_from_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('opinions');
    }
}
