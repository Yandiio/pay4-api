<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;


class SiswaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index()
    {
        $siswa = Siswa::all();
        return response()->json(['message'=>'success','data' => $siswa],200);
    }

    public function post(Request $request)
    {
        $data = new Siswa();
        $data->nama =  $request->input('nama');
        $data->nis =  $request->input('nis');
        $data->nisn =  $request->input('nisn');
        $data->no_telp = $request->input('telp');
        $data->alamat =  $request->input('alamat');
        $data->kelas_id =  $request->input('kelas_id');
        $data->save();

        return response()->json(['message'=>'success','status' => 'berhasil tambah data'],201);
    }

    public function update(Request $request,$id)
    {
        $data = Siswa::where('id',$id)->first();
        $data->nama =  $request->input('nama');
        $data->nis =  $request->input('nis');
        $data->nisn =  $request->input('nisn');
        $data->no_telp = $request->input('telp');
        $data->alamat =  $request->input('alamat');
        $data->kelas_id =  $request->input('kelas_id');
        $data->save();

        return response()->json(['status' => 'success','response' => 'berhasil edit data','data' => $data ]);
    }


    public function show($id)
    {
        $siswadata = Siswa::where('id',$id)->get();
        return response()->json(['message'=>'success','data' => $siswadata],200);
    }


    public function delete($id)
    {
      if(Siswa::destroy($id))
      {
          return response()->json(['status' => 'success','response' => 'data berhasil di hapus']);
      }
    }
}
