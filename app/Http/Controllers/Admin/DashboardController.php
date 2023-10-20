<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $pasien = DB::table('tb_pasien')->get();
        $berkas = DB::table('tb_tempat_tidur')->get();
        $dokter = DB::table('tb_datatempattidur')->get();
        $petugas = DB::table('tb_petugas')->get();

        return view('admin.dashboard', compact('pasien', 'berkas', 'dokter', 'petugas'));
    }
}
