<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use  App\Models\User;


class UserController extends Controller
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

    /**
      * Get a JWT via given credentials.
      *
      * @param  Request  $request
      * @return Response
      */
    public function allUser(Request $request)
    {
      return response()->json(['status'=>'success','message' => 'data retrieved','users' => User::all()],200);
    }

    /**
    * Get One users
    * @return Response
    */

    public function singleUser($id)
    {
      try {
          $user = User::findOrFail($id);
          return response()->json(['profile' => $user], 200);
      } catch (\Exception $e) {
          return response()->json(['status'=>'success','message' => 'data retrieved','message' => 'user not found!'], 404);
      }
    }


}
