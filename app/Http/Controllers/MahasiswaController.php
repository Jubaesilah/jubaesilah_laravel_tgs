<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    public function index(){
        $mahasiswa = DB::table('mahasiswa')->get();

        return view('admin.mahasiswa',['mahasiswa' => $mahasiswa]);
    
    }


    public function tambah(Request $request){
        DB::table('mahasiswa')->insert([
            'nama_mahasiswa'=> $request->nama_mahasiswa,
            'prodi'=> $request->prodi,
            'kelas'=> $request->kelas,
        ]);

        return redirect('/admin/mahasiswa');
    }
    
    public function update(Request $request){
        DB::table('mahasiswa')->where('id_mahasiswa',$request->id_mahasiswa)->update([
            'nama_mahasiswa'=> $request->nama_mahasiswa,
            'prodi'=> $request->prodi,
            'kelas'=> $request->kelas,
        ]);

        return redirect('/admin/mahasiswa');
    }
    public function hapus(Request $request){
        $id_mahasiswa=$request->id_mahasiswa;
        DB::table('mahasiswa')->where('id_mahasiswa',$id_mahasiswa)->delete();

        return redirect('/admin/mahasiswa');
    }
    
}
