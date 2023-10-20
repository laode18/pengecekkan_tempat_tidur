<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tempattidur extends Model
{
    public $table = 'tb_tempat_tidur';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id_tempattidur', 'no_tempat_tidur', 'kelas', 'status'
    ];
}
