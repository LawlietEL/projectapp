<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilPerusahaan extends Model
{
    use HasFactory;
    //cara menyamakan dengan nama tabel yang ada di database, karena laravel selalu menambahkan s dibelakang nama tabel
    protected $table = 'profil_perusahaan';
    protected $fillable = [
        'nama_perusahaan',
        'deskripsi',
        'latitude',
        'longitude',
        'jam_masuk',
        'jam_pulang',
    ];
}
