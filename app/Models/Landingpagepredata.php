<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Landingpagepredata extends Model
{
    public $table = 'tb_landingpage_predata';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id', 'judul_data', 'gambar', 'created_at', 'updated_at'
    ];
}
