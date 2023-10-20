<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Datatempattidur;
use App\Models\Tempattidur;

class DatatempattidurController extends Controller
{

    public function __construct()
    {
         $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $pasien = DB::table('tb_pasien')->get();
        $tempattidur = DB::table('tb_tempat_tidur')->get();
        $ruangan = DB::table('tb_ruangan')->get();

        $datatempattidur = DB::table('tb_datatempattidur')
            ->join('tb_tempat_tidur', 'tb_tempat_tidur.id_tempattidur', '=', 'tb_datatempattidur.id_tempattidur')
            ->join('tb_ruangan', 'tb_ruangan.id_ruangan', '=', 'tb_datatempattidur.id_ruangan')
            ->join('tb_pasien', 'tb_pasien.no_ktp', '=', 'tb_datatempattidur.no_ktp')
            ->get();

        return view('petugas.datatempattidur', compact('datatempattidur', 'pasien', 'tempattidur', 'ruangan'));
    }

    public function store(Request $request)
    {
        $datatempattidur = Datatempattidur::create([
            'id_tempattidur' => $request->id_tempattidur,
            'id_ruangan' => $request->id_ruangan,
            'no_ktp' => $request->no_ktp,
            'tanggal_pakai' => $request->tanggal_pakai,
            'tanggal_keluar' => $request->tanggal_keluar,
            'keterangan' => $request->keterangan,
        ]);

        DB::table('tb_tempat_tidur')->where('id_tempattidur', $request->id_tempattidur)->update([
            'status' => $request->status,
        ]);

        if($datatempattidur){
        //redirect dengan pesan sukses
            return redirect()->route('petugas.datatempattidur')->with(['success' => 'Data Saved Successfully!']);
        }else{
        //redirect dengan pesan error
            return redirect()->route('petugas.datatempattidur')->with(['error' => 'Data Save Failed!']);
        }

    }

    public function edit($id_datatidur)
    {
        $datatempattidur = DB::table('tb_datatempattidur')->get();

        return view('petugas.datatempattidur', compact('datatempattidur'));
    }

  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_tempattidur)
    {
        $tt = DB::table('tb_datatempattidur')->get();

        foreach ($tt as $tts) {
            DB::table('tb_tempat_tidur')->where('id_tempattidur', $tts->id_tempattidur)->update([
                'status' => "",
            ]);
        }

        DB::table('tb_datatempattidur')->where('id_datatidur',$request->id_datatidur)->update([
            'id_tempattidur' => $request->id_tempattidur,
            'id_ruangan' => $request->id_ruangan,
            'no_ktp' => $request->no_ktp,
            'tanggal_pakai' => $request->tanggal_pakai,
            'tanggal_keluar' => $request->tanggal_keluar,
            'keterangan' => $request->keterangan,
        ]);

        DB::table('tb_tempat_tidur')->where('id_tempattidur', $request->id_tempattidur)->update([
            'status' => $request->status,
        ]);

        return redirect('/petugas/datatempattidur')->with(['success' => 'Data Updated Successfully!']);
    }

    public function destroy(Request $request, $id_datatidur)
    {
        $tt = DB::table('tb_datatempattidur')->get();

        foreach ($tt as $tts) {
            DB::table('tb_tempat_tidur')->where('id_tempattidur', $tts->id_tempattidur)->update([
                'status' => "",
            ]);
        }
        
        DB::table('tb_datatempattidur')->where('id_datatidur', $id_datatidur)->delete();

        return redirect ('/petugas/datatempattidur')->with(['success' => 'Data Deleted Successfully!']);
    }
}
