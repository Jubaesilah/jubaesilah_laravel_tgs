<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DosenController extends Controller
{
    public function index(){
        $dosen = DB::table('dosen')->get();

        return view('dosen.dosen',['dosen' => $dosen]);
    
    }


    public function tambah(Request $request){
        DB::table('dosen')->insert([
            'nama_dosen'=> $request->nama_dosen,
            'pengajar'=> $request->pengajar,
            
        ]);

        return redirect('/dosen/dosen');
    }
    
    public function update(Request $request){
        DB::table('dosen')->where('id_dosen',$request->id_mahasiswa)->update([
            'nama_dosen'=> $request->nama_dosen,
            'pengajar'=> $request->pengajar,
            
        ]);

        return redirect('/dosen/dosen');
    }
    public function hapus(Request $request){
        $id_dosen=$request->id_dosen;
        DB::table('dosen')->where('id_dosen',$id_dosen)->delete();

        return redirect('/dosen/dosen');
    }
}
