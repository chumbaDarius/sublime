<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){
        if(Auth()->user()->is_admin==1){ 
        return $next($request);
    }
    else{
        return redirect('/welcome')->with('error','You have no admin access.');
    }
}

    else
    {
        return redirect('/Login')->with('message','Please Login First');

    }
}

}
