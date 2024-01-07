<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('UserID');
            $table->string('Nama');
            $table->string('Email')->unique();
            $table->string('Password');
            $table->string('NomorTelepon');
            $table->string('Alamat');
            $table->string('Kota');
            $table->string('Provinsi');
            $table->string('KodePos');
            $table->string('Status')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}

