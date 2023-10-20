<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Ruangan;

class RuanganController extends Controller
{

    public function __construct()
    {
         $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $ruangan = DB::table('tb_ruangan')->get();
        $tor = DB::table('tb_datatempattidur')
            ->whereNull('tanggal_keluar')->count('id_ruangan');

        return view('petugas.ruangan', compact('ruangan', 'tor'));
    }

    public function store(Request $request)
    {
        $ruangan = Ruangan::create([
            'nama_ruangan' => $request->nama_ruangan,
            'jumlah' => $request->jumlah,
        ]);

        if($ruangan){
        //redirect dengan pesan sukses
            return redirect()->route('petugas.ruangan')->with(['success' => 'Data Saved Successfully!']);
        }else{
        //redirect dengan pesan error
            return redirect()->route('petugas.ruangan')->with(['error' => 'Data Save Failed!']);
        }

    }

    public function edit($id_ruangan)
    {
        $berkas = DB::table('tb_ruangan')->get();

        return view('petugas.ruangan', compact('ruangan'));
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

        DB::table('tb_ruangan')->where('id_ruangan',$request->id_ruangan)->update([
            'nama_ruangan' => $request->nama_ruangan,
            'jumlah' => $request->jumlah,
        ]);

        return redirect('/petugas/ruangan')->with(['success' => 'Data Updated Successfully!']);
    }

    public function destroy($id_ruangan)
    {
        DB::table('tb_ruangan')->where('id_ruangan', $id_ruangan)->delete();

        return redirect ('/petugas/ruangan')->with(['success' => 'Data Deleted Successfully!']);
    }
}
