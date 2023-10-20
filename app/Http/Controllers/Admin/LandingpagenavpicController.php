<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Landingpagenavpic;

class LandingpagenavpicController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $navpic = DB::table('tb_landingpage_navpic')->get();

        return view('admin.menu.landingpagenavpic', compact('navpic'));
    }

    public function create()
    {
        return view('admin.menu.landingpagenavpic');
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'nama_gambar' => 'required',
            'gambar' => 'required',
        ]);

        if ($request->hasFile('gambar')) {
            $ambil=$request->file('gambar');
            $name=$ambil->getClientOriginalName();
            $namaFileBaru = uniqid();
            $namaFileBaru .= $name;
            $ambil->move(\base_path()."/public/images", $namaFileBaru);


        $navpic = Landingpagenavpic::create([
        'nama_gambar' => $request->nama_gambar,
        'gambar' => $namaFileBaru,
        
        ]);
    }

        if($navpic){
        //redirect dengan pesan sukses
            return redirect()->route('admin.navpic')->with(['success' => 'Data Saved Successfully!']);
        }else{
        //redirect dengan pesan error
            return redirect()->route('admin.navpic')->with(['error' => 'Data Save Failed!']);
        }

    }

    public function edit($id)
    {
        $navpic = Landingpagenavpic::where('id',$id)->get();

        return view('admin.navpic', compact('navpic'));
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


        DB::table('tb_landingpage_navpic')->where('id',$request->id)->update([
            'nama_gambar' => $request->nama_gambar,
            'gambar' => $namaFileBaru,
        ]);

        return redirect('/admin/landingpagenavpic')->with(['success' => 'Data Updated Successfully!']);
    }

    public function destroy($id)
    {
        DB::table('tb_landingpage_navpic')->where('id', $id)->delete();

        return redirect ('/admin/landingpagenavpic')->with(['success' => 'Data Deleted Successfully!']);
    }
}
