<?php

namespace App\Http\Controllers;

use App\Models\lonhapthuoc;
use App\Models\nhacungcap;
use App\Models\chitietlonhap;
use App\Models\donvitinhthuoc;
use App\Models\thuoc;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

session_start();

class ChiTietLoNhapController extends Controller
{
    public function AuthLogin()
    {
        $ad_ma = session()->get('ad_ma');
        if ($ad_ma) {
            return redirect('admin/index');
        } else {
            return redirect('admin/login')->send();
        }
    }
    public function index($id)
    {
        $this->AuthLogin();
        $lonhapthuoc = DB::table('lonhapthuoc')->where('lnt_ma', $id)->first();
        $nhacungcap = DB::table('nhacungcap')->where('ncc_ma', $lonhapthuoc->ncc_ma)->first();
        $dsctlnt = DB::table('chitietlonhap')->where('lnt_ma', $lonhapthuoc->lnt_ma)->get(); 
        $dsthuoc = thuoc::all();
        $dsdvtt = donvitinhthuoc::all();

        return view('admin.ad_details_import_medicine', compact('lonhapthuoc', 'dsctlnt', 'dsdvtt', 'nhacungcap', 'dsthuoc'));
    }
    public function add_details_import_medicine(Request $request)
    {
        $check=DB::table('chitietlonhap')->where('t_ma',$request->t_ma)->where('lnt_ma',$request->lnt_ma)->where('dvtt_ma',$request->dvtt_ma)->first();
        if($check){

            $request->session()->put('thongbao', 'Đã tồn tại');
        }else {
            $slchua=null;
            $dvtchua=null;
            if($request->ctlnt_slchua!='' && $request->ctlnt_dvtchua!=''){
                $slchua=$request->ctlnt_slchua;
                $dvtchua=$request->ctlnt_dvtchua;
            }
            $ctlonhap = new chitietlonhap;
            $ctlonhap->lnt_ma = $request->lnt_ma;
            $ctlonhap->t_ma = $request->t_ma;
            $ctlonhap->dvtt_ma = $request->dvtt_ma;
            $ctlonhap->ctlnt_gianhap = $request->ctlnt_gianhap;
            $ctlonhap->ctlnt_slchua = $slchua;
            $ctlonhap->ctlnt_dvtchua = $dvtchua;
          
            $ctlonhap->ctlnt_soluong = $request->ctlnt_soluong*$slchua;
            $ctlonhap->ctlnt_soluongnhap = $request->ctlnt_soluong*$slchua;
            $ctlonhap->ctlnt_ngaysx = $request->ctlnt_ngaysx;
            $ctlonhap->ctlnt_hansudung = $request->ctlnt_hansudung;
            $ctlonhap->save();
            $request->session()->put('thongbao', 'Thêm mới thành công');

        }
        return redirect('admin/details_import_medicine/' . $request->lnt_ma);
    }
    public function edit_details_import_medicine(Request $request)
    {
        $slchua=null;
            $dvtchua=null;
            if($request->ctlnt_slchua!='' && $request->ctlnt_dvtchua!=''){
                $slchua=$request->ctlnt_slchua;
                $dvtchua=$request->ctlnt_dvtchua;
            }
       $edit=DB::table('chitietlonhap')
       ->where('lnt_ma','=',$request->malonhap)
       ->where('t_ma','=',$request->mathuoc)
       ->update([
        'dvtt_ma' => $request->donvitinh,
        'ctlnt_gianhap' => $request->gianhap,
        'ctlnt_slchua' => $slchua,
        'ctlnt_dvtchua' => $dvtchua,
        'ctlnt_soluongnhap' => $request->soluong,
        'ctlnt_ngaysx' => $request->ngaysanxuat,
        'ctlnt_hansudung' => $request->hansudung
       ]);
        $request->session()->put('thongbao', 'Cập nhật thành công');
        return redirect('/admin/details_import_medicine/'.$request->malonhap);
    }
    public function delete_details_import_medicine(Request $request)
    {
        $lonhapthuoc = chitietlonhap::where('t_ma', $request->t_ma)->where('lnt_ma',$request->lnt_ma)->delete();

        $request->session()->put('thongbao', 'Xóa thành công');
        return redirect('admin/details_import_medicine/' . $request->lnt_ma);
    }
}
