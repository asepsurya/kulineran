<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //admin 1
        //user 0
        if(Auth::check()){
            if(Auth::user()->role == '1'){
                return $next($request);
            }else{
               return redirect('/')->with('message','Access Denied as you are not Admin');
            }
        }else{
            return redirect('/login')->with('message','Login to Access');
        }
        return $next($request);
       
    }
}
