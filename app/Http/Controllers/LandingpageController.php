<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pasien;
use App\Models\Datatempattidur;
  
class LandingpageController extends Controller
{   
    public function index(Request $request)
    {
        $datatempattidur = DB::table('tb_datatempattidur')
            ->join('tb_tempat_tidur', 'tb_tempat_tidur.id_tempattidur', '=', 'tb_datatempattidur.id_tempattidur')
            ->join('tb_ruangan', 'tb_ruangan.id_ruangan', '=', 'tb_datatempattidur.id_ruangan')
            ->join('tb_pasien', 'tb_pasien.no_ktp', '=', 'tb_datatempattidur.no_ktp')
            ->get();

        $navpic = DB::table('tb_landingpage_navpic')->get();
        $predata = DB::table('tb_landingpage_predata')->get();
        $tempattidur = DB::table('tb_tempat_tidur')
            ->join('tb_kelas', 'tb_kelas.kelas', '=', 'tb_tempat_tidur.kelas')
            ->get();
        $pasien = DB::table('tb_pasien')->get();
        $ruangan = DB::table('tb_ruangan')->get();
        $sisa = DB::table('tb_datatempattidur')->get();
        // $berkas = DB::table('tb_berkas')->get();
        $lakis = DB::table('tb_pasien')->where('jenis_kelamin', '=', 'Laki-Laki',$request->jenis_kelamin)->get();
        $perempuans = DB::table('tb_pasien')->where('jenis_kelamin', '=', 'Perempuan',$request->jenis_kelamin)->get();
        $gambar1 = DB::table('tb_landingpage_predata')->where('id', '=', '1',$request->id)->get();
        $gambar2 = DB::table('tb_landingpage_predata')->where('id', '=', '2',$request->id)->get();
        $gambar3 = DB::table('tb_landingpage_predata')->where('id', '=', '3',$request->id)->get();
        $gambar4 = DB::table('tb_landingpage_predata')->where('id', '=', '4',$request->id)->get();
        $gambar5 = DB::table('tb_landingpage_predata')->where('id', '=', '5',$request->id)->get();
        $gambar6 = DB::table('tb_landingpage_predata')->where('id', '=', '6',$request->id)->get();

        $tor = DB::table('tb_datatempattidur')
            ->whereNull('tanggal_keluar')->count('id_ruangan');

        return view('landingpage', compact('navpic', 'tempattidur', 'pasien', 'ruangan', 'predata', 'perempuans', 'lakis', 'sisa', 'gambar1', 'gambar2', 'gambar3', 'gambar4', 'gambar5', 'gambar6', 'datatempattidur', 'tor'));
    }

    public function store(Request $request)
    {

        $pasien = Pasien::create([
        'nama_pasien' => $request->nama_pasien,
        'no_ktp' => $request->no_ktp,
        'jenis_kelamin' => $request->jenis_kelamin,
        'alamat' => $request->alamat,
        'tanggal_lahir' => $request->tanggal_lahir,
        ]);

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

        if($pasien){
        //redirect dengan pesan sukses
            return redirect()->route('landingpage')->with(['success' => 'Data Saved Successfully!']);
        }else{
        //redirect dengan pesan error
            return redirect()->route('landingpage')->with(['error' => 'Data Save Failed!']);
        }

    }
}