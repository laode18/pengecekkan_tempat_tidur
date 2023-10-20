<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Landingpagenavpic extends Model
{
    public $table = 'tb_landingpage_navpic';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id', 'nama_gambar', 'gambar', 'created_at', 'updated_at'
    ];
}
