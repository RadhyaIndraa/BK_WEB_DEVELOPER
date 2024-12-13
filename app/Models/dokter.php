<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dokter extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'dokter'; // Pastikan sesuai dengan nama tabel di database Anda

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'nama',
        'alamat',
        'no_hp',
        'id_poli',
    ];

    // Relasi ke tabel Poli (asumsi Anda memiliki tabel Poli)
    public function poli()
    {
        return $this->belongsTo(Poli::class, 'id_poli');
    }

    // Nonaktifkan penggunaan timestamps
    public $timestamps = false;
}
