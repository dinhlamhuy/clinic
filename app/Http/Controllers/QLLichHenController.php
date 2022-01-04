<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class QLLichHenController extends Controller
{
    public function status_appchedule(){
        $dstrangthailh=DB::table('trangthailichhen')->get();
        return view('admin/ad_status_appschedule',compact('dstrangthailh'));
    }
    public function appointment_schedule(){
        $dslichhen = DB::table('dangky')
        ->join('lichhen', 'dangky.dk_ma', '=', 'lichhen.dk_ma')
        ->join('trangthailichhen', 'trangthailichhen.ttlh_ma', '=', 'lichhen.ttlh_ma')
        ->join('khunggio', 'khunggio.kg_ma', '=', 'lichhen.kg_ma')
        ->join('buoi', 'khunggio.buoi_ma', '=', 'buoi.buoi_ma')
        ->select('dangky.*', 'lichhen.*', 'trangthailichhen.*', 'khunggio.*', 'buoi.*' , 'lichhen.created_at as ngaydat')
        ->get();
    $dsctlh = DB::table('chitietlichhen')
        ->join('trieuchunglichhen', 'trieuchunglichhen.tclh_ma', '=', 'chitietlichhen.tclh_ma')
        ->select('trieuchunglichhen.*', 'chitietlichhen.*')
        ->get();
        return view(
            'admin.ad_appschedule',
            compact(
                'dsctlh',
                'dslichhen',
                // 'dsphieukhambenh',
                
            )
        );
    }
}
