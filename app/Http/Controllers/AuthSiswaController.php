<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Siswa;


class AuthSiswaController extends Controller
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


    /**
     * Create a new token.
     * 
     * @param  \App\User   $user
     * @return string
     */

    /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function register(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required|string',
            'nisn' => 'required|string',
            'nis' => 'required|string',
            'alamat' => 'required|string',
            'no_telp' => 'required|string',
            'password' => 'required|confirmed'
        ]);

        try{
            $pengguna = new Siswa;
            $pengguna->nama = $request->input('nama');
            $pengguna->nisn = $request->input('nisn');
            $pengguna->nis = $request->input('nis');
            $plainPass = $request->input('password');
            $pengguna->password = app('hash')->make($plainPass);
            $pengguna->alamat = $request->input('alamat');
            $pengguna->no_telp = $request->input('no_telp');

            $pengguna->save();

            return response()->json(['siswa' => 'berhasil diregistrasi','message' => 'created','data' => $pengguna],201);

        } catch (\Exception $e){
            return response()->json(['message' => 'registrasi gagal'],409);
        }
    }

    /**
      * Get a JWT via given credentials.
      *
      * @param  Request  $request
      * @return Response
      */
    public function login(Request $request)
    {
          //validate incoming request
        $this->validate($request, [
            'nis' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only(['nis', 'password']);

        if (!$token = Auth::attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }




}
