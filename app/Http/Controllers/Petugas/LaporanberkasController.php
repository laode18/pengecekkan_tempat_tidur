<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pasien;

class LaporanberkasController extends Controller
{

    public function __construct()
    {
         $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        return view('petugas.laporandata');
    }

    public function datapasien(Request $request)
    {
        $pasien = DB::table('tb_pasien')->get();

        return view('petugas.previewpasien', compact('pasien'));
    }

    public function databerkas(Request $request)
    {
        $berkas = DB::table('tb_datatempattidur')
            ->join('tb_tempat_tidur', 'tb_tempat_tidur.id_tempattidur', '=', 'tb_datatempattidur.id_tempattidur')
            ->join('tb_ruangan', 'tb_ruangan.id_ruangan', '=', 'tb_datatempattidur.id_ruangan')
            ->join('tb_pasien', 'tb_pasien.no_ktp', '=', 'tb_datatempattidur.no_ktp')
            ->get();

        return view('petugas.previewberkas', compact('berkas'));
    }

    public function bulanBukuBesar(Request $request, $tanggal_pakai)
    {
        $data = DB::table('tb_datatempattidur')
            ->join('tb_tempat_tidur', 'tb_tempat_tidur.id_tempattidur', '=', 'tb_datatempattidur.id_tempattidur')
            ->join('tb_ruangan', 'tb_ruangan.id_ruangan', '=', 'tb_datatempattidur.id_ruangan')
            ->join('tb_pasien', 'tb_pasien.no_ktp', '=', 'tb_datatempattidur.no_ktp')
            ->whereMonth('tanggal_pakai', $request->tanggal_pakai)->get();

        return response()->json($data);
    }
}
