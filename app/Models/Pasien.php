<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pasien extends Model
{
    public $table = 'tb_pasien';
    protected $primaryKey = 'id_pasien';
    public $timestamps = false;

    protected $fillable = [
        'id_pasien', 'no_ktp', 'no_rm', 'nama_pasien', 'jenis_kelamin', 'alamat', 'tanggal_lahir'
    ];
}
