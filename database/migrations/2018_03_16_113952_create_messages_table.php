<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {

            $table->increments('id');
            
            $table->string('text');
            $table->integer('id_conversation')->unsigned();
            $table->foreign('id_conversation')->references('id')->on('conversations');
             $table->integer('who_send');
            // $table->integer('id_user_from')->unsigned();
            // $table->foreign('id_user_to_send')->references('id')->on('users');
            // $table->foreign('id_user_from')->references('id')->on('users');
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
        Schema::dropIfExists('messages');
    }
}
