<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = "pendaftaran";
    protected $fillable = [
        'users_id',
        'nama_lengkap',
        'alamat_ktp',
        'alamat_sekarang',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'noTelp',
        'noHp',
        'email',
        'kewarganegaraan',
        'tgl_lahir',
        'kabupaten_lahir',
        'provinsi_lahir',
        'negara_lahir',
        'jenis_kelamin',
        'status_menikah',
        'agama'
    ];
}
