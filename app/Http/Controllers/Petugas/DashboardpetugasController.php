<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardpetugasController extends Controller
{

    public function __construct()
    {
         $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $pasien = DB::table('tb_pasien')->get();
        $berkas = DB::table('tb_datatempattidur')->get();
        $tempat = DB::table('tb_tempat_tidur')->get();

        return view('petugas.dashboard', compact('pasien', 'tempat', 'berkas'));
    }
}
