<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;


class AuthController extends Controller
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
    protected function jwt()
    {

    }


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
            'username' => 'required|unique:petugas',
            'password' => 'required|confirmed'
        ]);

        try{
            $pengguna = new User;
            $pengguna->nama_petugas = $request->input('nama');
            $pengguna->username = $request->input('username');
            $plainPass = $request->input('password');
            $pengguna->password = app('hash')->make($plainPass);
            $pengguna->level = $request->input('level');

            $pengguna->save();

            return response()->json(['user' => 'berhasil diregistrasi','message' => 'created','data' => $pengguna],201);

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
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only(['username', 'password']);

        if (!$token = Auth::attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }




}
