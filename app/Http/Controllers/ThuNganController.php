<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\benhnhan;
use App\Models\phieukhambenh;
use App\Models\trangthaikham;
use App\Models\loaihinhkham;
use App\Models\phieuchidinh;
use App\Models\phong;
use Illuminate\Support\Facades\DB;

session_start();

class ThuNganController extends Controller
{
    public function AuthLoginNV()
    {
        $p_ma = session()->get('p_ma');
        $nv_ma = session()->get('nv_ma');
        if ($nv_ma) {
            if ($p_ma == '1') {
                //    Tiếp tân
                return redirect('/staff/receive');
            } else if ($p_ma == '2') {
                // Thu ngân
                return redirect('/staff/cashier');
            } else if ($p_ma == '3') {
                // Phát thuốc
                return redirect('/staff/medicine_supply');
            } else if ($p_ma == '4' || $p_ma == '5' || $p_ma == '6' || $p_ma == '7') {
                // Khám bệnh
                return redirect('/staff/medical_examination');
            } else if ($p_ma == '10' || $p_ma == '9' ||  $p_ma == '8') {
                return redirect('/staff/subclinical_examination');
            }
        } else {
            return redirect('staff/st_login')->send();
        }
    }
    public function index()
    {
        $this->AuthLoginNV();

        $dschuathanhtoan = DB::table('phieukhambenh')
            ->join('benhnhan', 'benhnhan.bn_ma', '=', 'phieukhambenh.bn_ma')
            ->join('trangthaikham', 'trangthaikham.ttk_ma', '=', 'phieukhambenh.ttk_ma')
            ->join('loaihinhkham', 'loaihinhkham.lhk_ma', '=', 'phieukhambenh.lhk_ma')
            ->join('phong', 'phong.p_ma', '=', 'phieukhambenh.p_ma')
            // ->where('phieukhambenh.created_at',date('Y-m-d'))
            ->where('phieukhambenh.ttk_ma', '1')
            ->get();
        return view('staff.st_cashier', compact('dschuathanhtoan'));
    }
    public function confirm_pkb(Request $req)
    {
        $id_pkb = $req->pkb_ma;
        $pkb = phieukhambenh::find($id_pkb);
        $pkb->ttk_ma = '2';
        $pkb->save();
        $req->session()->put('thongbao', 'Xác nhận thành công');

        return redirect('/staff/cashier');
    }
    public function cls()
    {
        $this->AuthLoginNV();
        
        $dschuathanhtoan = DB::table('phieukhambenh')
            ->join('benhnhan', 'benhnhan.bn_ma', '=', 'phieukhambenh.bn_ma')
            ->join('phieuchidinh', 'phieuchidinh.pkb_ma', '=', 'phieukhambenh.pkb_ma')
            ->join('loaihinhkham', 'loaihinhkham.lhk_ma', '=', 'phieukhambenh.lhk_ma')
            // ->where('phieukhambenh.created_at',date('Y-m-d'))
            ->where('phieuchidinh.pcd_trangthai', '0')
            ->get();

        $dschidinh = DB::table('chitietchidinh')
            ->join('phieuchidinh', 'phieuchidinh.pcd_ma', '=', 'chitietchidinh.pcd_ma')
            ->get();
        return view('staff.st_cashiercls', compact('dschuathanhtoan', 'dschidinh'));
    }
    public function confirm_cls(Request $req)
    {
        $id_pcd = $req->pcd_ma;
        $pcd = phieuchidinh::find($id_pcd);
        $pcd->pcd_trangthai = '1';
        $pcd->save();
        $req->session()->put('thongbao', 'Xác nhận thành công');

        return redirect('/staff/cashiercls');
    }
}
