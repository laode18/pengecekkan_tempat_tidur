<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pasien;

class DatapasienController extends Controller
{

    public function __construct()
    {
         $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $pasien = DB::table('tb_pasien')->get();

        return view('petugas.datapasien', compact('pasien'));
    }

    public function create()
    {
        return view('petugas.datapasien');
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'nama_pasien' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
        ]);

        $pasien = Pasien::create([
        'nama_pasien' => $request->nama_pasien,
        'no_ktp' => $request->no_ktp,
        'no_rm' => $request->no_rm,
        'jenis_kelamin' => $request->jenis_kelamin,
        'alamat' => $request->alamat,
        'tanggal_lahir' => $request->tanggal_lahir,
        ]);

        if($pasien){
        //redirect dengan pesan sukses
            return redirect()->route('petugas.datapasien')->with(['success' => 'Data Saved Successfully!']);
        }else{
        //redirect dengan pesan error
            return redirect()->route('petugas.datapasien')->with(['error' => 'Data Save Failed!']);
        }

    }

    public function edit($id_pasien)
    {
        $pasien = Pasien::where('id_pasien',$id_pasien)->get();

        return view('petugas.datapasien', compact('pasien'));
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

        DB::table('tb_pasien')->where('id_pasien',$request->id_pasien)->update([
            'nama_pasien' => $request->nama_pasien,
            'no_ktp' => $request->no_ktp,
            'no_rm' => $request->no_rm,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir,
        ]);

        return redirect('/petugas/datapasien')->with(['success' => 'Data Updated Successfully!']);
    }

    public function destroy($id_pasien)
    {
        DB::table('tb_pasien')->where('id_pasien', $id_pasien)->delete();

        return redirect ('/petugas/datapasien')->with(['success' => 'Data Deleted Successfully!']);
    }
}
