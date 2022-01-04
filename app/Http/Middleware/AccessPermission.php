<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
session_start();
class AccessPermission
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
        if(session()->get('nv_ma')){
            // if (session()->get('p_ma') == '1') {
            //     //    Tiếp tân
            //     return redirect('/staff/receive');
            // } else if (session()->get('p_ma') == '2') {
            //     // Thu ngân
            //     return redirect('/staff/cashier');
            // } else if (session()->get('p_ma') == '3') {
            //     // Phát thuốc
            //     return redirect('/staff/medicine_supply');
            // } else if (session()->get('p_ma') == '4' || session()->get('p_ma') == '5' || session()->get('p_ma') == '6' || session()->get('p_ma') == '7') {
            //     // Khám bệnh
            //     return redirect('/staff/medical_examination');
            // } else if (session()->get('p_ma') == '9' ||  session()->get('p_ma') == '8') {

            //     return redirect('/staff/subclinical_examination');
            // }
            return $next($request);
        }
        return redirect('staff/st_login');
    }
}
