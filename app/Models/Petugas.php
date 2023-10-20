<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Petugas extends Model
{
    public $table = 'tb_petugas';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id', 'name', 'email', 'password', 'jenis_kelamin', 'no_hp'
    ];
}
