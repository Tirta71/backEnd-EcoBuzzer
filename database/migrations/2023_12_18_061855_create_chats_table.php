<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatsTable extends Migration
{
    public function up()
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->id('ChatID');
            $table->unsignedBigInteger('SenderID');
            $table->foreign('SenderID')->references('UserID')->on('users');
            $table->unsignedBigInteger('ReceiverID');
            $table->foreign('ReceiverID')->references('UserID')->on('users');
            $table->unsignedBigInteger('ProductID');
            $table->foreign('ProductID')->references('ProductID')->on('produks')->onDelete('cascade');
            $table->text('IsiPesan');
            $table->dateTime('WaktuPengiriman');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('chats');
    }
}
