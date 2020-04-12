<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use  App\Models\Siswa;


class UserSiswaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function profile()
    {
        return response()->json(['status'=>'success','message' => 'data retrieved','user' => Auth::User()],200);
    }
    
}
