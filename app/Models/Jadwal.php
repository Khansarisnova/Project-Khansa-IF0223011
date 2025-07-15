<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal'; // ← Wajib ditambah karena kamu pakai nama tunggal

    protected $fillable = [
        "no",
        "tanggal",
        "hari",
        "jam",
        "ruangan",
        "mata_kuliah",
        "status_ujian",
    ];
}
