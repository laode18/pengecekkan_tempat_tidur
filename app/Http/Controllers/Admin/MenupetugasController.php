<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Menupetugas;

class MenupetugasController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $menupetugas = DB::table('tb_menu_petugas')->get();

        return view('admin.menu.petugas', compact('menupetugas'));
    }

    public function create()
    {
        return view('admin.menu.petugas');
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'nama_menu' => 'required',
            'icon' => 'required',
            'status' => 'required',
        ]);

        $menupetugas = Menupetugas::create([
        'nama_menu' => $request->nama_menu,
        'icon' => $request->icon,
        'status' => $request->status,   
        
        ]);

        if($menupetugas){
        //redirect dengan pesan sukses
            return redirect()->route('admin.menupetugas')->with(['success' => 'Data Saved Successfully!']);
        }else{
        //redirect dengan pesan error
            return redirect()->route('admin.menupetugas')->with(['error' => 'Data Save Failed!']);
        }

    }

    public function edit($id)
    {
        $menupetugas = Menupetugas::where('id',$id)->get();

        return view('admin.menu.petugas', compact('menupetugas'));
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

        DB::table('tb_menu_petugas')->where('id',$request->id)->update([
            'nama_menu' => $request->nama_menu,
            'icon' => $request->icon,
            'status' => $request->status,
        ]);

        return redirect('/admin/menupetugas')->with(['success' => 'Data Updated Successfully!']);
    }

    public function destroy($id)
    {
        DB::table('tb_menu_petugas')->where('id', $id)->delete();

        return redirect ('/admin/menupetugas')->with(['success' => 'Data Deleted Successfully!']);
    }
}
