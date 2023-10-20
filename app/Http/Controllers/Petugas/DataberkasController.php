<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pasien;
use App\Models\Berkas;
use App\Models\Dosen;

class DataberkasController extends Controller
{

    public function __construct()
    {
         $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $berkas = DB::table('tb_berkas')
            ->join('tb_pasien', 'tb_pasien.id_pasien', '=', 'tb_berkas.id_pasien')
            ->join('tb_dokter', 'tb_dokter.id_dokter', '=', 'tb_berkas.id_dokter')
            ->get();

        $pasien = DB::table('tb_pasien')->get();
        $dokter = DB::table('tb_dokter')->get();

        return view('petugas.databerkas', compact('berkas', 'pasien', 'dokter'));
    }

    public function store(Request $request)
    {
        $berkas = Berkas::create([
            'id_pasien' => $request->id_pasien,
            'id_dokter' => $request->id_dokter,
            'tanggal_pinjam' => $request->tanggal_pinjam,
        ]);

        if($berkas){
        //redirect dengan pesan sukses
            return redirect()->route('petugas.databerkas')->with(['success' => 'Data Saved Successfully!']);
        }else{
        //redirect dengan pesan error
            return redirect()->route('petugas.databerkas')->with(['error' => 'Data Save Failed!']);
        }

    }

    public function edit($id_berkas)
    {
        $berkas = DB::table('tb_berkas')
            ->join('tb_pasien', 'tb_pasien.id_pasien', '=', 'tb_berkas.id_pasien')
            ->join('tb_dokter', 'tb_dokter.id_dokter', '=', 'tb_berkas.id_dokter')
            ->where('id_berkas', $id_berkas)->get();

        return view('petugas.databerkas', compact('berkas'));
    }

  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        DB::table('tb_berkas')->where('id_berkas',$request->id_pasien)->update([
            'id_pasien' => $request->id_pasien,
            'id_dokter' => $request->id_dokter,
            'tanggal_pinjam' => $request->tanggal_pinjam,
        ]);

        return redirect('/petugas/datapasien')->with(['success' => 'Data Updated Successfully!']);
    }

    public function destroy($id_berkas)
    {
        DB::table('tb_berkas')->where('id_berkas', $id_berkas)->delete();

        return redirect ('/petugas/databerkas')->with(['success' => 'Data Deleted Successfully!']);
    }
}
