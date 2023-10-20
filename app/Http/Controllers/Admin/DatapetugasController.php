<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Petugas;
use App\Models\User;
use Hash;

class DatapetugasController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $petugas = DB::table('tb_petugas')->get();

        return view('admin.datapetugas', compact('petugas'));
    }

    public function create()
    {
        return view('admin.datapetugas');
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'jenis_kelamin' => 'required',
            'no_hp' => 'required',
        ]);

        $petugas = Petugas::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password,
        'jenis_kelamin' => $request->jenis_kelamin,
        'no_hp' => $request->no_hp,
        
        ]);

        $user = new User();
        $user->name = $request->post('name');
        $user->email = $request->post('email');
        $user->password = Hash::make($request->post('password'));
        $user->level = 'petugas';
        $user->save();

        if($petugas){
        //redirect dengan pesan sukses
            return redirect()->route('admin.datapetugas')->with(['success' => 'Data Saved Successfully!']);
        }else{
        //redirect dengan pesan error
            return redirect()->route('admin.datapetugas')->with(['error' => 'Data Save Failed!']);
        }

    }

    public function edit($id)
    {
        $petugas = Petugas::where('id',$id)->get();

        return view('admin.datapetugas', compact('clients'));
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
        DB::table('tb_petugas')->where('id',$request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_hp' => $request->no_hp,
        ]);

        DB::table('users')->where('id',$request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/admin/datapetugas')->with(['success' => 'Data Updated Successfully!']);
    }

    public function destroy($id)
    {
        DB::table('tb_petugas')->where('id', $id)->delete();
        DB::table('users')->where('id', $id)->delete();

        return redirect ('/admin/datapetugas')->with(['success' => 'Data Deleted Successfully!']);
    }

    // public function show(Request $request,$id_client)
    // {
    //     $cli = Client::find($id_client);
    //     return view('datamaster.client.showclient',compact('clients'))->renderSections()['content'];
    // }
}
