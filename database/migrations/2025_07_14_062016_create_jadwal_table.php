<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id();
            $table->string('no');
            $table->date('tanggal');
            $table->enum('hari',['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu']);
            $table->time('jam');
            $table->enum('ruangan',['L1.R1','L1.R2','L1.R3','L1.R4','L1.R5','L2.R1','L2.R2','L2.R3']);
            $table->enum('mata_kuliah',['Interaksi manusia dan komputer','islam dan ilmu pengetahuan','kewarganegaraan','pengenalan pola','teknologi basis data','praktikum teknologi basis data','metode penulisan karya ilmiyah','pemograman web','praktikum pemograman web','cloud computing','information retrival']);
            $table->enum('status_ujian',['Sudah','Belum']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal');
    }
};
