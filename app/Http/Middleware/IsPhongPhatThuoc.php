<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
session_start();
class IsPhongPhatThuoc
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

            if (session()->get('p_ma') == '3') {
                // return redirect('/staff/medicine_supply');
                return $next($request);
            } else {
                return back()->withInput();
            }
        } else {

            return redirect('staff/st_login');
        }
        // return $next($request);
    }
}
