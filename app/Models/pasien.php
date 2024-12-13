<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak sesuai konvensi
    protected $table = 'pasien';

    // Tentukan kolom yang dapat diisi
    protected $fillable = ['nama', 'alamat', 'no_ktp', 'no_hp', 'no_rm'];

    // Nonaktifkan timestamps jika tidak digunakan
    public $timestamps = false;
}
