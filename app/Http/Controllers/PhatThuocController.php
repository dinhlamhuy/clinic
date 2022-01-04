<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\benhnhan;
use App\Models\lichhen;
use App\Models\trieuchunglichhen;
use App\Models\khunggio;
use App\Models\chitietlichhen;
use App\Models\bhyt;
use App\Models\phieukhambenh;
use App\Models\nghenghiep;
use App\Models\doituong;
use App\Models\quyenloi;
use App\Models\chiso;
use App\Models\chitietchiso;
use App\Models\trangthaikham;
use App\Models\trieuchungbenh;
use App\Models\benh;
use App\Models\thuoc;
use App\Models\donthuoc;
use App\Models\chitietdonthuoc;
use App\Models\chitietchidinh;
use App\Models\trieuchung;
use App\Models\chandoan;
use App\Models\benhphu;
use App\Models\phieuchidinh;
class PhatThuocController extends Controller
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
            } else if ($p_ma == '10' || $p_ma == '9' || $p_ma == '8') {

                return redirect('/staff/subclinical_examination');
            }
        } else {
            return redirect('staff/st_login')->send();
        }
    }
    public function index()
    {
        $this->AuthLoginNV();
      
        $donthuoc = DB::table('donthuoc')
            ->join('phieukhambenh', 'phieukhambenh.pkb_ma', '=', 'donthuoc.pkb_ma')
            ->join('loaihinhkham', 'loaihinhkham.lhk_ma', '=', 'phieukhambenh.lhk_ma')
            ->join('benhnhan', 'benhnhan.bn_ma', '=', 'phieukhambenh.bn_ma')
            ->join('loaidonthuoc', 'loaidonthuoc.ldt_ma', '=', 'donthuoc.ldt_ma')
            ->select('*', 'phieukhambenh.created_at as ngaylap')
            ->get();
            $chuandoan = DB::table('chandoan')
            ->join('benh', 'benh.b_ma', '=', 'chandoan.b_ma')
            ->join('donthuoc', 'donthuoc.dthuoc_ma', '=', 'chandoan.dthuoc_ma')
            ->join('phieukhambenh', 'phieukhambenh.pkb_ma', '=', 'donthuoc.pkb_ma')
            // ->where('phieukhambenh.pkb_ma', $id)
            ->get();
            $bhyt = DB::table('phieukhambenh')
            ->join('bhyt', 'bhyt.bn_ma', '=', 'phieukhambenh.bn_ma')
            ->join('doituong', 'doituong.dt_ma', '=', 'bhyt.dt_ma')
            ->join('quyenloi', 'quyenloi.ql_ma', '=', 'bhyt.ql_ma')
            ->join('noicap', 'noicap.nc_ma', '=', 'bhyt.nc_ma')
            ->get();
        $ketoa = DB::table('donthuoc')
            ->join('phieukhambenh', 'phieukhambenh.pkb_ma', '=', 'donthuoc.pkb_ma')
            ->join('loaidonthuoc', 'loaidonthuoc.ldt_ma', '=', 'donthuoc.ldt_ma')
            ->join('chitietdonthuoc', 'chitietdonthuoc.dthuoc_ma', '=', 'donthuoc.dthuoc_ma')
            ->join('thuoc', 'thuoc.t_ma', '=', 'chitietdonthuoc.t_ma')
            ->join('chitietlonhap', 'chitietlonhap.t_ma', '=', 'thuoc.t_ma')
            ->join('donvitinhthuoc', 'donvitinhthuoc.dvtt_ma', '=', 'chitietlonhap.dvtt_ma')
            ->join('cachsudung', 'cachsudung.csd_ma', '=', 'thuoc.csd_ma')
            ->get();
        return view('staff.st_medicine_supply', compact('donthuoc','ketoa','bhyt'));
     
    }
    public function thanhtoanthuoc(Request $request)
    {
        $this->AuthLoginNV();
        $pkb=$request->pkb_ma;
        $dthuoc=$request->dthuoc_ma;
        $ketoa = DB::table('donthuoc')
        ->join('phieukhambenh', 'phieukhambenh.pkb_ma', '=', 'donthuoc.pkb_ma')
        ->join('loaidonthuoc', 'loaidonthuoc.ldt_ma', '=', 'donthuoc.ldt_ma')
        ->join('chitietdonthuoc', 'chitietdonthuoc.dthuoc_ma', '=', 'donthuoc.dthuoc_ma')
        ->join('thuoc', 'thuoc.t_ma', '=', 'chitietdonthuoc.t_ma')
        ->join('chitietlonhap', 'chitietlonhap.t_ma', '=', 'thuoc.t_ma')
        ->join('donvitinhthuoc', 'donvitinhthuoc.dvtt_ma', '=', 'chitietlonhap.dvtt_ma')
        ->join('cachsudung', 'cachsudung.csd_ma', '=', 'thuoc.csd_ma')
        
        ->join('benhnhan','benhnhan.bn_ma','=','phieukhambenh.bn_ma')

        ->where('phieukhambenh.pkb_ma', $pkb)
        ->where('donthuoc.dthuoc_ma', $dthuoc)
        ->get();
        foreach ($ketoa as $tenthuoc) {
            $thaydoi=DB::table('chitietlonhap')
            ->where('chitietlonhap.t_ma', $tenthuoc->t_ma)
            ->where('chitietlonhap.lnt_ma', $tenthuoc->lnt_ma)
            ->update(['chitietlonhap.ctlnt_soluong' =>  ($tenthuoc->ctlnt_soluong-$tenthuoc->ctdt_soluong)]);
            // var_dump($thaydoi); 
            // var_dump($tenthuoc->ctlnt_soluong.'<br>'); 
            // var_dump($tenthuoc->ctdt_soluong.'<br>'); 
            // var_dump('hết 1 rpof <br>');
        }
        $trangthai=donthuoc::find($dthuoc);
        $trangthai->dthuoc_trangthai='1';
        $trangthai->save();

        
        $request->session()->put('thongbao', 'Xác nhận thành công');

       return redirect('/staff/medicine_supply');
    }
    public function hoadonthuoc($pkb){
        $donthuoc = DB::table('donthuoc')
            ->join('phieukhambenh', 'phieukhambenh.pkb_ma', '=', 'donthuoc.pkb_ma')
            ->join('loaihinhkham', 'loaihinhkham.lhk_ma', '=', 'phieukhambenh.lhk_ma')
            ->join('benhnhan', 'benhnhan.bn_ma', '=', 'phieukhambenh.bn_ma')
            ->join('xa', 'xa.x_ma', '=', 'benhnhan.x_ma')
            ->join('huyen', 'huyen.h_ma', '=', 'xa.h_ma')
            ->join('thanhpho', 'thanhpho.tp_ma', '=', 'huyen.tp_ma')

            ->join('loaidonthuoc', 'loaidonthuoc.ldt_ma', '=', 'donthuoc.ldt_ma')
            ->where('phieukhambenh.pkb_ma','=',$pkb)
            ->select('*', 'phieukhambenh.created_at as ngaylap')
            ->first();
            $chuandoan = DB::table('chandoan')
            ->join('benh', 'benh.b_ma', '=', 'chandoan.b_ma')
            ->join('donthuoc', 'donthuoc.dthuoc_ma', '=', 'chandoan.dthuoc_ma')
            ->join('phieukhambenh', 'phieukhambenh.pkb_ma', '=', 'donthuoc.pkb_ma')
            ->where('phieukhambenh.pkb_ma','=',$pkb)
            ->get();
            $bhyt = DB::table('phieukhambenh')
            ->join('bhyt', 'bhyt.bn_ma', '=', 'phieukhambenh.bn_ma')
            ->join('doituong', 'doituong.dt_ma', '=', 'bhyt.dt_ma')
            ->join('quyenloi', 'quyenloi.ql_ma', '=', 'bhyt.ql_ma')
            ->join('noicap', 'noicap.nc_ma', '=', 'bhyt.nc_ma')
            ->where('phieukhambenh.pkb_ma','=',$pkb)
            ->first();
        $ketoa = DB::table('donthuoc')
            ->join('phieukhambenh', 'phieukhambenh.pkb_ma', '=', 'donthuoc.pkb_ma')
            ->join('loaidonthuoc', 'loaidonthuoc.ldt_ma', '=', 'donthuoc.ldt_ma')
            ->join('chitietdonthuoc', 'chitietdonthuoc.dthuoc_ma', '=', 'donthuoc.dthuoc_ma')
            ->join('thuoc', 'thuoc.t_ma', '=', 'chitietdonthuoc.t_ma')
            ->join('chitietlonhap', 'chitietlonhap.t_ma', '=', 'thuoc.t_ma')
            ->join('donvitinhthuoc', 'donvitinhthuoc.dvtt_ma', '=', 'chitietlonhap.dvtt_ma')
            ->join('cachsudung', 'cachsudung.csd_ma', '=', 'thuoc.csd_ma')
            ->where('phieukhambenh.pkb_ma','=',$pkb)
            ->get();
        return view('staff.st_hoadonthuoc', compact('donthuoc','ketoa','bhyt','chuandoan'));
    }
}
