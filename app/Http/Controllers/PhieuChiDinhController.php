<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\hinhanh;
session_start();
class PhieuChiDinhController extends Controller
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
           } else if ($p_ma == '9' ||  $p_ma == '8' ||  $p_ma == '10') {

               return redirect('/staff/subclinical_examination');
           }
       } else {
           return redirect('staff/st_login')->send();
       }
   }
   public function index()
   {

      $this->AuthLoginNV();

      $dsphieuchidinh_xn = DB::table('phieuchidinh')
         ->join('phieukhambenh', 'phieukhambenh.pkb_ma', '=', 'phieuchidinh.pkb_ma')
         ->join('chitietchidinh', 'chitietchidinh.pcd_ma', '=', 'phieuchidinh.pcd_ma')
         ->join('phong', 'phong.p_ma', '=', 'chitietchidinh.p_ma')
         ->join('canlamsang', 'canlamsang.cls_ma', '=', 'chitietchidinh.cls_ma')
         ->join('benhnhan', 'benhnhan.bn_ma', '=', 'phieukhambenh.bn_ma')
         ->where('phieuchidinh.pcd_trangthai', '1')
         ->where('canlamsang.ncls_ma', '1')
         ->get();

      $dsphieuchidinh_sa = DB::table('phieuchidinh')
         ->join('phieukhambenh', 'phieukhambenh.pkb_ma', '=', 'phieuchidinh.pkb_ma')
         ->join('chitietchidinh', 'chitietchidinh.pcd_ma', '=', 'phieuchidinh.pcd_ma')
         ->join('phong', 'phong.p_ma', '=', 'chitietchidinh.p_ma')
         ->join('canlamsang', 'canlamsang.cls_ma', '=', 'chitietchidinh.cls_ma')
         ->join('benhnhan', 'benhnhan.bn_ma', '=', 'phieukhambenh.bn_ma')
         ->where('phieuchidinh.pcd_trangthai', '1')
         ->where('canlamsang.ncls_ma', '2')
         ->get();

      $dsphieuchidinh_ns = DB::table('phieuchidinh')
         ->join('phieukhambenh', 'phieukhambenh.pkb_ma', '=', 'phieuchidinh.pkb_ma')
         ->join('chitietchidinh', 'chitietchidinh.pcd_ma', '=', 'phieuchidinh.pcd_ma')
         ->join('phong', 'phong.p_ma', '=', 'chitietchidinh.p_ma')
         ->join('canlamsang', 'canlamsang.cls_ma', '=', 'chitietchidinh.cls_ma')
         ->join('benhnhan', 'benhnhan.bn_ma', '=', 'phieukhambenh.bn_ma')
         ->where('phieuchidinh.pcd_trangthai', '1')
         // ->where('chitietchidinh.p_ma', '10')
         ->where('canlamsang.ncls_ma', '3')
         ->get();
    
         

      return view('staff.st_subclinical_examination', compact('dsphieuchidinh_xn', 'dsphieuchidinh_sa','dsphieuchidinh_ns'));
   }
   public function sieuam($pcd, $cls)
   {
      $dssa = DB::table('phieuchidinh')
         ->join('phieukhambenh', 'phieukhambenh.pkb_ma', '=', 'phieuchidinh.pkb_ma')
         ->join('chitietchidinh', 'chitietchidinh.pcd_ma', '=', 'phieuchidinh.pcd_ma')
         ->join('canlamsang', 'canlamsang.cls_ma', '=', 'chitietchidinh.cls_ma')
         ->join('benhnhan', 'benhnhan.bn_ma', '=', 'phieukhambenh.bn_ma')
         ->join('phong', 'phong.p_ma', '=', 'phieukhambenh.p_ma')
         ->join('chitietnhanvienphong', 'chitietnhanvienphong.p_ma', '=', 'phong.p_ma')
      ->join('nhanvien', 'nhanvien.nv_ma', '=', 'chitietnhanvienphong.nv_ma')
         ->join('chitietnhanvien', 'chitietnhanvien.nv_ma', '=', 'nhanvien.nv_ma')
         ->join('chucvu', 'chucvu.cv_ma', '=', 'chitietnhanvien.cv_ma')
         // ->where('chitietchidinh.p_ma', '')
         ->where('chitietchidinh.pcd_ma', $pcd)
         ->where('chitietchidinh.cls_ma', $cls)
         ->select('*', 'phieuchidinh.created_at as ngaytaophieu')
         ->first();

         $bhyt=DB::table('bhyt')
         ->join('doituong','doituong.dt_ma','=','bhyt.dt_ma')
         ->join('quyenloi','quyenloi.ql_ma','=','bhyt.ql_ma')
         ->join('noicap','noicap.nc_ma','=','bhyt.nc_ma')
         ->get();

      return view('staff.st_subclinical_exam_sa', compact('dssa','bhyt'));
   }
   public function noisoi($pcd, $cls)
   {
      $dsns = DB::table('phieuchidinh')
         ->join('phieukhambenh', 'phieukhambenh.pkb_ma', '=', 'phieuchidinh.pkb_ma')
         ->join('chitietchidinh', 'chitietchidinh.pcd_ma', '=', 'phieuchidinh.pcd_ma')
         ->join('canlamsang', 'canlamsang.cls_ma', '=', 'chitietchidinh.cls_ma')
         ->join('benhnhan', 'benhnhan.bn_ma', '=', 'phieukhambenh.bn_ma')
         ->join('phong', 'phong.p_ma', '=', 'phieukhambenh.p_ma')
         ->join('chitietnhanvienphong', 'chitietnhanvienphong.p_ma', '=', 'phong.p_ma')
         ->join('nhanvien', 'nhanvien.nv_ma', '=', 'chitietnhanvienphong.nv_ma')
         ->join('chitietnhanvien', 'chitietnhanvien.nv_ma', '=', 'nhanvien.nv_ma')
         ->join('chucvu', 'chucvu.cv_ma', '=', 'chitietnhanvien.cv_ma')
         // ->where('chitietchidinh.p_ma', '')
         ->where('chitietchidinh.pcd_ma', $pcd)
         ->where('chitietchidinh.cls_ma', $cls)
         ->select('*', 'phieuchidinh.created_at as ngaytaophieu')
         ->first();

         $bhyt=DB::table('bhyt')
         ->join('doituong','doituong.dt_ma','=','bhyt.dt_ma')
         ->join('quyenloi','quyenloi.ql_ma','=','bhyt.ql_ma')
         ->join('noicap','noicap.nc_ma','=','bhyt.nc_ma')
         ->get();

      return view('staff.st_subclinical_exam_ns', compact('dsns','bhyt'));
   }

   public function xetnghiem($pcd, $cls)
   {
      $dsxetnghiem = DB::table('phieuchidinh')
         ->join('chitietchidinh', 'chitietchidinh.pcd_ma', '=', 'phieuchidinh.pcd_ma')
         ->join('canlamsang', 'canlamsang.cls_ma', '=', 'chitietchidinh.cls_ma')
         ->where('phieuchidinh.pcd_trangthai', '1')
         ->where('canlamsang.ncls_ma', '1')
         ->where('canlamsang.cls_ma', $cls)
         ->where('phieuchidinh.pcd_ma', $pcd)
         ->first();

      $dsxn = DB::table('phieuchidinh')
      ->join('phieukhambenh', 'phieukhambenh.pkb_ma', '=', 'phieuchidinh.pkb_ma')
      ->join('chitietchidinh', 'chitietchidinh.pcd_ma', '=', 'phieuchidinh.pcd_ma')
      ->join('canlamsang', 'canlamsang.cls_ma', '=', 'chitietchidinh.cls_ma')
      ->join('benhnhan', 'benhnhan.bn_ma', '=', 'phieukhambenh.bn_ma')
      ->join('phong', 'phong.p_ma', '=', 'phieukhambenh.p_ma')
      ->join('chitietnhanvienphong', 'chitietnhanvienphong.p_ma', '=', 'phong.p_ma')
      ->join('nhanvien', 'nhanvien.nv_ma', '=', 'chitietnhanvienphong.nv_ma')
      ->join('chitietnhanvien', 'chitietnhanvien.nv_ma', '=', 'nhanvien.nv_ma')
      ->join('chucvu', 'chucvu.cv_ma', '=', 'chitietnhanvien.cv_ma')
         ->where('phieuchidinh.pcd_trangthai', '1')
         ->where('canlamsang.cls_ma', $cls)
         ->where('phieuchidinh.pcd_ma', $pcd)
         ->select('*', 'phieuchidinh.created_at as ngaytaophieu')
         ->first();
         $bhyt=DB::table('bhyt')
         ->join('doituong','doituong.dt_ma','=','bhyt.dt_ma')
         ->join('quyenloi','quyenloi.ql_ma','=','bhyt.ql_ma')
         ->join('noicap','noicap.nc_ma','=','bhyt.nc_ma')
         ->get();

      return view('staff.st_subclinical_exam_xn', compact('dsxetnghiem', 'dsxn','bhyt'));
   }
   public function text_results(Request $request)
   {
      $addctcd = DB::table('chitietchidinh')
         ->join('canlamsang', 'canlamsang.cls_ma', '=', 'chitietchidinh.cls_ma')
         ->where('canlamsang.ncls_ma', '1')
         ->where('canlamsang.cls_ma', $request->cls_ma)
         ->where('chitietchidinh.pcd_ma', $request->pcd_ma)
         ->update([
            'ctcd_ketquachidinh'   => $request->ketluancd,
            'ctcd_ctthuchien'   => $request->ketqua
         ]);
         $request->session()->put('thongbao', 'Hoàn tất xét nghiệm');

         return redirect('staff/subclinical_examination');
   }
   public function kq_sieuam(Request $request){

      $addctcd = DB::table('chitietchidinh')
      ->join('canlamsang', 'canlamsang.cls_ma', '=', 'chitietchidinh.cls_ma')
      ->where('canlamsang.ncls_ma', '2')
      ->where('chitietchidinh.cls_ma', $request->cls_ma)
      ->where('chitietchidinh.pcd_ma', $request->pcd_ma)
      ->update([
         'ctcd_ketquachidinh'   => $request->ketluancd,
         'ctcd_ctthuchien'   => $request->ketquasa
      ]);

         $files=[];
         if ($request->hasFile('anhsieuam')) {
         foreach ($request->anhsieuam as $anhsieuam) {
               $name = time().rand(1,100).'.'.$anhsieuam->extension();
               $anhsieuam->move(public_path('images'), $name);  
               $files[] = $name;  
               $hinhanh = new hinhanh;
               $hinhanh->pcd_ma = $request->pcd_ma;
               $hinhanh->cls_ma = $request->cls_ma;
               $hinhanh->ha_ten = $name;
               $hinhanh->save();
             }
            }
   $request->session()->put('thongbao', 'Siêu âm thành công');

   return redirect('staff/subclinical_examination');

   }
   public function kq_noisoi(Request $request){

      $addctcd = DB::table('chitietchidinh')
      ->join('canlamsang', 'canlamsang.cls_ma', '=', 'chitietchidinh.cls_ma')
      ->where('canlamsang.ncls_ma', '3')
      ->where('chitietchidinh.cls_ma', $request->cls_ma)
      ->where('chitietchidinh.pcd_ma', $request->pcd_ma)
      ->update([
         'ctcd_ketquachidinh'   => $request->ketluancd,
         'ctcd_ctthuchien'   => $request->ketquans
      ]);

         $files=[];
         if ($request->hasFile('anhnoisoi')) {
         foreach ($request->anhnoisoi as $anhnoisoi) {
               $name = time().rand(1,100).'.'.$anhnoisoi->extension();
               $anhnoisoi->move(public_path('images'), $name);  
               $files[] = $name;  
               $hinhanh = new hinhanh;
               $hinhanh->pcd_ma = $request->pcd_ma;
               $hinhanh->cls_ma = $request->cls_ma;
               $hinhanh->ha_ten = $name;
               $hinhanh->save();
             }
            }
   $request->session()->put('thongbao', 'Nội soi thành công');

   return redirect('staff/subclinical_examination');

   }
   public function inphieusieuam($pcd, $cls){
      $phieusieuam=DB::table('phieuchidinh')
      ->join('chitietchidinh', 'chitietchidinh.pcd_ma', '=', 'phieuchidinh.pcd_ma')
      ->join('canlamsang','canlamsang.cls_ma','chitietchidinh.cls_ma')
      ->join('phieukhambenh', 'phieukhambenh.pkb_ma', '=', 'phieuchidinh.pkb_ma')
      ->join('benhnhan', 'benhnhan.bn_ma', '=', 'phieukhambenh.bn_ma')
      ->join('xa', 'xa.x_ma', '=', 'benhnhan.x_ma')
      ->join('huyen', 'huyen.h_ma', '=', 'xa.h_ma')
      ->join('thanhpho', 'thanhpho.tp_ma', '=', 'huyen.tp_ma')
      ->where('canlamsang.cls_ma','=',$cls)
      ->where('phieuchidinh.pcd_ma',$pcd)
      ->select('*', 'phieuchidinh.created_at as ngaylap')
      ->first();


      // $bhyt=DB::table('bhyt')
      // ->join('doituong','doituong.dt_ma','=','bhyt.dt_ma')
      // ->join('quyenloi','quyenloi.ql_ma','=','bhyt.ql_ma')
      // ->join('noicap','noicap.nc_ma','=','bhyt.nc_ma')
      // ->where('bhyt.bn_ma','=',$phieusieuam->bn_ma)->first();

      $hinhanhminhhoa=DB::table('hinhanh')
      ->where('hinhanh.pcd_ma',$pcd)
      ->where('hinhanh.cls_ma','=',$cls)
      ->get();
      return view('staff.st_phieukqsieuam', compact('phieusieuam','hinhanhminhhoa'));
   }
   public function inphieunoisoi($pcd, $cls){
      $phieunoisoi=DB::table('phieuchidinh')
      ->join('chitietchidinh', 'chitietchidinh.pcd_ma', '=', 'phieuchidinh.pcd_ma')
      ->join('canlamsang','canlamsang.cls_ma','chitietchidinh.cls_ma')
      ->join('phieukhambenh', 'phieukhambenh.pkb_ma', '=', 'phieuchidinh.pkb_ma')
      ->join('benhnhan', 'benhnhan.bn_ma', '=', 'phieukhambenh.bn_ma')
      ->join('xa', 'xa.x_ma', '=', 'benhnhan.x_ma')
      ->join('huyen', 'huyen.h_ma', '=', 'xa.h_ma')
      ->join('thanhpho', 'thanhpho.tp_ma', '=', 'huyen.tp_ma')
      ->where('canlamsang.cls_ma','=',$cls)
      ->where('phieuchidinh.pcd_ma',$pcd)
      ->select('*', 'phieuchidinh.created_at as ngaylap')
      ->first();


      // $bhyt=DB::table('bhyt')
      // ->join('doituong','doituong.dt_ma','=','bhyt.dt_ma')
      // ->join('quyenloi','quyenloi.ql_ma','=','bhyt.ql_ma')
      // ->join('noicap','noicap.nc_ma','=','bhyt.nc_ma')
      // ->where('bhyt.bn_ma','=',$phieunoisoi->bn_ma)->first();
      
  
      $hinhanhminhhoa=DB::table('hinhanh')
      ->where('hinhanh.pcd_ma','=',$pcd)
      ->where('hinhanh.cls_ma','=',$cls)
      ->get();
      return view('staff.st_phieukqnoisoi', compact('phieunoisoi','hinhanhminhhoa'));
   }
   public function inphieuxetnghiem($pcd , $cls){
      $phieuxetnghiem=DB::table('phieuchidinh')
      ->join('phieukhambenh', 'phieukhambenh.pkb_ma', '=', 'phieuchidinh.pkb_ma')
      ->join('chitietchidinh','chitietchidinh.pcd_ma','phieuchidinh.pcd_ma')
      ->join('canlamsang','canlamsang.cls_ma','chitietchidinh.cls_ma')
      ->join('benhnhan', 'benhnhan.bn_ma', '=', 'phieukhambenh.bn_ma')
      ->join('xa', 'xa.x_ma', '=', 'benhnhan.x_ma')
      ->join('huyen', 'huyen.h_ma', '=', 'xa.h_ma')
      ->join('thanhpho', 'thanhpho.tp_ma', '=', 'huyen.tp_ma')
      ->where('phieuchidinh.pcd_ma',$pcd)
      ->where('canlamsang.cls_ma','=',$cls)
      ->where('canlamsang.ncls_ma','=','1')
      ->select('*', 'phieuchidinh.created_at as ngaylap')
      ->first();
      $chitiet=DB::table('chitietchidinh')
      ->join('phieuchidinh','phieuchidinh.pcd_ma','chitietchidinh.pcd_ma')
      ->join('canlamsang','canlamsang.cls_ma','chitietchidinh.cls_ma')
      ->where('chitietchidinh.pcd_ma',$pcd)
      ->where('canlamsang.ncls_ma','=','1')
      ->get();

      return view('staff.st_phieukqxetnghiem',compact('phieuxetnghiem','chitiet'));
   }
}
