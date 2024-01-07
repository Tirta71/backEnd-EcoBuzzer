<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduksTable extends Migration
{
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id('ProductID');
            $table->string('NamaProduk');
            $table->text('Deskripsi');
            $table->unsignedBigInteger('KategoriID');
            $table->foreign('KategoriID')->references('KategoriID')->on('kategoris')->onDelete('cascade');
            $table->decimal('Harga', 10, 2);
            $table->enum('Status', ['Available', 'Sold']);
            $table->unsignedBigInteger('UserID');
            $table->foreign('UserID')->references('UserID')->on('users');
            $table->unsignedBigInteger('LokasiID');
            $table->foreign('LokasiID')->references('LokasiID')->on('lokasis')->onDelete('cascade');
            $table->dateTime('TanggalDiposting');
            $table->enum('Kondisi', ['Baik', 'Rusak', 'Sebagian Rusak']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('produks');
    }
}

