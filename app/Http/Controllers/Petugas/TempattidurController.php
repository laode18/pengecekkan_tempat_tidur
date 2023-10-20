<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tempattidur;

class TempattidurController extends Controller
{

    public function __construct()
    {
         $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $tempattidur = DB::table('tb_tempat_tidur')
            ->join('tb_kelas', 'tb_kelas.kelas', '=', 'tb_tempat_tidur.kelas')
            ->get();
            
        $kelas = DB::table('tb_kelas')->get();

        return view('petugas.tempattidur', compact('tempattidur', 'kelas'));
    }

    public function store(Request $request)
    {
        $tempattidur = Tempattidur::create([
            'no_tempat_tidur' => $request->no_tempat_tidur,
            'kelas' => $request->kelas,
        ]);

        if($tempattidur){
        //redirect dengan pesan sukses
            return redirect()->route('petugas.tempattidur')->with(['success' => 'Data Saved Successfully!']);
        }else{
        //redirect dengan pesan error
            return redirect()->route('petugas.tempattidur')->with(['error' => 'Data Save Failed!']);
        }

    }

    public function edit($id_tempattidur)
    {
        $tempattidur = DB::table('tb_tempat_tidur')->get();

        return view('petugas.tempattidur', compact('tempattidur'));
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

        DB::table('tb_tempat_tidur')->where('id_tempattidur',$request->id_tempattidur)->update([
            'no_tempat_tidur' => $request->no_tempat_tidur,
            'kelas' => $request->kelas,
        ]);

        return redirect('/petugas/tempattidur')->with(['success' => 'Data Updated Successfully!']);
    }

    public function destroy($id_tempattidur)
    {
        DB::table('tb_tempat_tidur')->where('id_tempattidur', $id_tempattidur)->delete();

        return redirect ('/petugas/tempattidur')->with(['success' => 'Data Deleted Successfully!']);
    }
}
