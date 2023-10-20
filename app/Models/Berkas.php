<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Berkas extends Model
{
    public $table = 'tb_berkas';
    protected $primaryKey = 'id_berkas';
    public $timestamps = false;

    protected $fillable = [
        'id_berkas', 'id_pasien', 'id_dokter', 'tanggal_pinjam'
    ];
}
