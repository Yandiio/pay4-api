<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use Illuminate\Http\Request;


class SppController extends Controller
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
        $spp = Spp::all();
        return response()->json(['data' => $spp],200);
    }

    public function store(Request $request)
    {
        $data = new Spp();
        $data->tahun =  $request->input('tahun');
        $data->nominal =  $request->input('nominal');
        $data->save();

        return response()->json(['data' => 'berhasil tambah data'],200);
    }

    public function update(Request $request,$id)
    {
        $data = Spp::where('id',$id)->first();
        $data->tahun =  $request->input('tahun');
        $data->nominal =  $request->input('nominal');
        $data->save();

        return response()->json(['status' => 'success','response' => 'berhasil edit data','data' => $data ]);
    }


    public function show($id)
    {
        $sppdata = Spp::where('id',$id)->get();
        return response($sppdata);
    }

    public function delete($id)
    {
        if(Spp::destroy($id))
        {
            return response()->json(['status' => 'success','response' => 'data berhasil di hapus']);
        }
    }
}
