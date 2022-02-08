<?php

namespace App\Http\Middleware;

use Closure;

class CheckLoginAdmin
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
        if (get_data_user('admins','id')) {
            return $next($request);
        }
        else{
            return redirect()->route('admin.get.login');
        }
        
    }
}
