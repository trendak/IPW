<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConversation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conversations', function (Blueprint $table) {
            
            $table->increments('id');
            $table->integer('id_user_to_send')->unsigned();
            $table->integer('id_user_from')->unsigned();
            $table->string('title');
            $table->foreign('id_user_to_send')->references('id')->on('users');
            $table->foreign('id_user_from')->references('id')->on('users');
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
        Schema::dropIfExists('conversations');
    }
}
