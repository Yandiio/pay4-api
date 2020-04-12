<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;


class PembayaranController extends Controller
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
        $datakelas = Pembayaran::all();
        return response()->json(['data' => $datakelas],200);
    }


    public function store(Request $request)
    {
        $data = new Pembayaran();
        $data->tgl_pembayaran =  $request->input('tgl_pembayaran');
        $data->jumlah_bulan =  $request->input('jumlah_bulan');
        $data->keterangan =  $request->input('keterangan');
        $data->jumlah_pembayaran =  $request->input('jumlah_pembayaran');

        $data->save();

        return response()->json(['status' => 'berhasil tambah data','data' => $data]);
    }


    public function update(Request $request,$id)
    {
      $data = Pembayaran::where('id',$id)->first();
      $data->tgl_pembayaran =  $request->input('tgl_pembayaran');
      $data->jumlah_bulan =  $request->input('jumlah_bulan');
      $data->keterangan =  $request->input('keterangan');
      $data->jumlah_pembayaran =  $request->input('jumlah_pembayaran');

      $data->save();

      return response()->json(['status' => 'success','response' => 'berhasil edit data','data' => $data ]);
    }


    public function show($id)
    {
        $datas = Pembayaran::where('id',$id)->get();
        return response()->json(['status' => 'success','data' => $datas]);
    }


    public function delete($id)
    {
      if(Pembayaran::destroy($id))
      {
          return response()->json(['status' => 'success','response' => 'data berhasil di hapus']);
      }
    }
}
