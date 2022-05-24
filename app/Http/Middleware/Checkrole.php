<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Checkrole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ... $roles)
    {
         $user = Auth::user();
        // dd($user);
        // if($user->role == 1){
        //     return $next($request);
        // }
        // return redirect('/');
        // if ($user->role == '0') {
        //     return $next($request);
        // }

        
        foreach($roles as $role) {
            // Check if user has the role This check will depend on how your roles are set up
            if($user->role == $role)
                return $next($request);
        }
        return redirect('/');

    }
}
