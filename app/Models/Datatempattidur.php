<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Datatempattidur extends Model
{
    public $table = 'tb_datatempattidur';
    protected $primaryKey = 'id_datatidur';
    public $timestamps = false;

    protected $fillable = [
        'id_datatidur', 'id_tempattidur', 'id_ruangan', 'no_ktp', 'tanggal_pakai', 'tanggal_keluar', 'keterangan'
    ];
}
