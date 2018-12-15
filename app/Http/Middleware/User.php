<?php

namespace App\Http\Middleware;

use Closure;

class User
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {        
        print_r(auth()->user()); die;
        if(auth()->user()->isUser == 1){
            return $next($request);
        }
        echo 'dsfsd'; die;
        return redirect('welcome')->with('error','You have not User access');
    }
}
