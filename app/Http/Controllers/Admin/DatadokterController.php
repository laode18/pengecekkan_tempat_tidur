<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Dokter;

class DatadokterController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $dokter = DB::table('tb_dokter')->get();

        return view('admin.datadokter', compact('dokter'));
    }

    public function create()
    {
        return view('admin.datadokter');
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'nama_dokter' => 'required',
            'jenis_kelamin' => 'required',
            'spesialis' => 'required',
            'alamat' => 'required',
        ]);

        $dokter = Dokter::create([
        'nama_dokter' => $request->nama_dokter,
        'jenis_kelamin' => $request->jenis_kelamin,
        'spesialis' => $request->spesialis,
        'alamat' => $request->alamat,
        
        ]);

        if($dokter){
        //redirect dengan pesan sukses
            return redirect()->route('admin.datadokter')->with(['success' => 'Data Saved Successfully!']);
        }else{
        //redirect dengan pesan error
            return redirect()->route('admin.datadokter')->with(['error' => 'Data Save Failed!']);
        }

    }

    public function edit($id_dokter)
    {
        $dokter = Dokter::where('id_dokter',$id_dokter)->get();

        return view('admin.datadokter', compact('dokter'));
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
        DB::table('tb_dokter')->where('id_dokter',$request->id_dokter)->update([
            'nama_dokter' => $request->nama_dokter,
            'jenis_kelamin' => $request->jenis_kelamin,
            'spesialis' => $request->spesialis,
            'alamat' => $request->alamat,
        ]);

        return redirect('/admin/datadokter')->with(['success' => 'Data Updated Successfully!']);
    }

    public function destroy($id_dokter)
    {
        DB::table('tb_dokter')->where('id_dokter', $id_dokter)->delete();

        return redirect ('/admin/datadokter')->with(['success' => 'Data Deleted Successfully!']);
    }
}
