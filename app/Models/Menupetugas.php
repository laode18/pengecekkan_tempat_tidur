<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menupetugas extends Model
{
    public $table = 'tb_menu_petugas';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id', 'nama_menu', 'icon', 'status', 'created_at', 'updated_at'
    ];
}
