<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Landingpagepredata;

class LandingpagepredataController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $predata = DB::table('tb_landingpage_predata')->get();

        return view('admin.menu.landingpagepredata', compact('predata'));
    }

    public function create()
    {
        return view('admin.menu.landingpagepredata');
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'judul_data' => 'required',
            'gambar' => 'required',
        ]);

        if ($request->hasFile('gambar')) {
            $ambil=$request->file('gambar');
            $name=$ambil->getClientOriginalName();
            $namaFileBaru = uniqid();
            $namaFileBaru .= $name;
            $ambil->move(\base_path()."/public/images", $namaFileBaru);

        $predata = Landingpagepredata::create([
        'judul_data' => $request->judul_data,
        'gambar' => $namaFileBaru,
        
        ]);
    }

        if($predata){
        //redirect dengan pesan sukses
            return redirect()->route('admin.predata')->with(['success' => 'Data Saved Successfully!']);
        }else{
        //redirect dengan pesan error
            return redirect()->route('admin.predata')->with(['error' => 'Data Save Failed!']);
        }

    }

    public function edit($id)
    {
        $navpic = Landingpagepredata::where('id',$id)->get();

        return view('admin.predata', compact('predata'));
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
        $ambil=$request->file('gambar');
            $name=$ambil->getClientOriginalName();
            $namaFileBaru = uniqid();
            $namaFileBaru .= $name;
            $ambil->move(\base_path()."/public/images", $namaFileBaru);


        DB::table('tb_landingpage_predata')->where('id',$request->id)->update([
            'judul_data' => $request->judul_data,
            'gambar' => $namaFileBaru,
        ]);

        return redirect('/admin/landingpagepredata')->with(['success' => 'Data Updated Successfully!']);
    }

    public function destroy($id)
    {
        DB::table('tb_landingpage_predata')->where('id', $id)->delete();

        return redirect ('/admin/landingpagepredata')->with(['success' => 'Data Deleted Successfully!']);
    }
}
