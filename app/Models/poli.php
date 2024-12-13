<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class poli extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'poli'; // Pastikan sesuai dengan nama tabel di database

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'nama_poli',
        'keterangan',
    ];

    // Relasi dengan dokter
    public function doctors()
    {
        return $this->hasMany(dokter::class, 'id_poli');
    }

    // Nonaktifkan penggunaan timestamps
    public $timestamps = false;
}
