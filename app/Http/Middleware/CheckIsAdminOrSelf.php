<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckIsAdminOrSelf
{
    public function handle($request, Closure $next)
    {
        $user = \App\Models\User::where('username',$request->username)->first();
        
        if( $user->level == 'admin' || $user->level == 'petugas' ) {
            return $next($request);
        }
        else {
            return response()->json(['error' => 'Unauthorized'], 403);
        }
    }
}