<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;


class KelasController extends Controller
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
        $datakelas = Kelas::all();
        return response()->json(['data' => $datakelas],200);
    }

    public function store(Request $request)
    {
        $data = new Kelas();
        $data->nama_kelas =  $request->input('nama_kelas');
        $data->save();

        return response()->json(['status' => 'berhasil tambah data','data' => $data],201);
    }

    public function show($id)
    {
        $datas = Kelas::where('id',$id)->get();
        return response()->json(['data' => $datas],200);
    }

    public function update(Request $request,$id)
    {
        $data = Kelas::where('id',$id)->first();
        $data->nama_kelas =  $request->input('nama_kelas');
        $data->save();

        return response()->json(['status' => 'success','response' => 'berhasil edit data','data' => $data ]);
    }

    public function delete($id)
    {
        if(Kelas::destroy($id))
        {
            return response()->json(['status' => 'success','response' => 'data berhasil di hapus']);
        }
    }
}
