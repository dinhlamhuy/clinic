<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
session_start();
class IsPhongTiepNhan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (session()->get('nv_ma')) {

            if (session()->get('p_ma') == '1') {
                // return redirect('/staff/receive');
                return $next($request);
            }else {
                return back()->withInput();
            }
            
        } else {

            return redirect('staff/st_login');
        }
    }
}
