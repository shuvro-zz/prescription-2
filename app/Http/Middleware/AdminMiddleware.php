<?php

namespace App\Http\Middleware;

use App\model\Sell;
use Closure;

class AdminMiddleware
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
        if ($request->session()->has('login_id')) {            
            return $next($request);
        }
        else{
            $message_logout=$request->session()->flash('message_logout', 'Please Log in first');
            return redirect('login');
        }


    }
}