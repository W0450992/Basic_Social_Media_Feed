<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserIsAdmin
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

        if (Auth::user() != null) {

            if (Auth::user()->id == 1) { // if user is admin
                return $next($request); //allow to proceed
            }
            else{
                return redirect(route('posts.index'))->with('status', 'You are not a User Admin. Access Denied');
            }
        }
        else{
            return redirect(route('posts.index'))->with('status', 'You are not a User Admin. Access Denied');
        }

    }
}
