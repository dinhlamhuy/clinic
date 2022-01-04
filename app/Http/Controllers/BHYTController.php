<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bhyt;
use App\Models\doituong;
use App\Models\quyenloi;
use App\Models\noicap;
use App\Models\thanhpho;
use Illuminate\Support\Facades\DB;

session_start();

class BHYTController extends Controller
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

    public function object()
    {
        $this->AuthLogin();
        $dsdoituong = doituong::all();
        return view('admin.ad_object',compact('dsdoituong'));
    }

    public function add_object(Request $request)
    {

        $result = DB::table('doituong')->where('dt_ten', $request->dt_ten)->first();
        if ($result) {
            $request->session()->put('thongbao', 'Đã tồn tại');
        } else {
            $cvu = new doituong;
            $cvu->dt_ten = $request->dt_ten;
            $cvu->dt_ghichu = $request->dt_ghichu;
            $cvu->save();

            $request->session()->put('thongbao', 'Thêm mới thành công');
        }
        return redirect('/admin/object');
    }

    public function edit_object(Request $request)
    {
        $result = DB::table('doituong')->where('dt_ma', $request->dt_ma)->where('dt_ten', $request->dt_ten)->where('dt_ghichu', $request->dt_ghichu)->first();
        if ($result) {
        }else {
            $kttrungten = DB::table('doituong')->where('dt_ma', '<>', $request->dt_ma)->where('dt_ten', $request->dt_ten)->first();
            if ($kttrungten) {
                $request->session()->put('thongbao', 'Đã tồn tại');

            } else {
                $dt = new doituong;
                $dt = doituong::find($request->dt_ma);
                $dt->dt_ten=$request->dt_ten;
                $dt->dt_ghichu=$request->dt_ghichu;
                $dt->save();
                $request->session()->put('thongbao', 'Cập nhật thành công');
            }
        }
        return redirect('/admin/object');
    }

    public function delete_object(Request $request){
        $cvu = doituong::find($request->dt_ma);
        $cvu->delete();
        
        $request->session()->put('thongbao', 'Xóa thành công');
        return redirect('/admin/object');
    }

    public function interest()
    {
        $this->AuthLogin();
        $dsquyenloi = quyenloi::all();
        return view('admin.ad_interest',compact('dsquyenloi'));
    }
    public function add_interest(Request $request)
    {

        $result = DB::table('quyenloi')->where('ql_so', $request->ql_so)->first();
        if ($result) {
            $request->session()->put('thongbao', 'Đã tồn tại');
        } else {
            $cvu = new quyenloi;
            $cvu->ql_so = $request->ql_so;
            $cvu->ql_phantram = $request->ql_phantram;
            $cvu->save();

            $request->session()->put('thongbao', 'Thêm mới thành công');
        }
        return redirect('/admin/interest');
    }

    public function edit_interest(Request $request)
    {
        $result = DB::table('quyenloi')->where('ql_ma', $request->ql_ma)->where('ql_so', $request->ql_so)->where('ql_phantram', $request->ql_phantram)->first();
        if ($result) {

        }else {
            $kttrungten = DB::table('quyenloi')->where('ql_ma', '<>', $request->ql_ma)->where('ql_so', $request->ql_so)->first();
            if ($kttrungten) {
                $request->session()->put('thongbao', 'Đã tồn tại');

            } else {
                $ql = new quyenloi;
                $ql = quyenloi::find($request->ql_ma);
                $ql->ql_so=$request->ql_so;
                $ql->ql_phantram=$request->ql_phantram;
                $ql->save();
                $request->session()->put('thongbao', 'Cập nhật thành công');
            }
        }
        return redirect('/admin/interest');
    }


    public function delete_interest(Request $request){
        $cvu = quyenloi::find($request->ql_ma);
        $cvu->delete();
        
        $request->session()->put('thongbao', 'Xóa thành công');
        return redirect('/admin/interest');
    }

    // Nơi cấp
    public function issued()
    {
        $this->AuthLogin();
        $dsnoicap = noicap::all();
        $dsthanhpho = thanhpho::all();
        return view('admin.ad_issued',compact('dsnoicap','dsthanhpho'));
    }
    public function add_issued(Request $request)
    {

        $result = DB::table('noicap')->where('nc_so', $request->nc_so)->first();
        if ($result) {
            $request->session()->put('thongbao', 'Đã tồn tại');
        } else {
            $cvu = new noicap;
            $cvu->nc_so = $request->nc_so;
            $cvu->nc_thanhpho= $request->nc_thanhpho;
            $cvu->save();

            $request->session()->put('thongbao', 'Thêm mới thành công');
        }
        return redirect('/admin/issued');
    }

    public function edit_issued(Request $request)
    {
        $result = DB::table('noicap')->where('nc_ma', $request->nc_ma)->where('nc_so', $request->nc_so)->where('nc_thanhpho', $request->nc_thanhpho)->first();
        if ($result) {

        }else {
            $kttrungten = DB::table('noicap')->where('nc_ma', '<>', $request->nc_ma)->where('nc_so', $request->nc_so)->first();
            if ($kttrungten) {
                $request->session()->put('thongbao', 'Đã tồn tại');

            } else {
                $ql = new noicap;
                $ql = noicap::find($request->nc_ma);
                $ql->nc_so=$request->nc_so;
                $ql->nc_thanhpho=$request->nc_thanhpho;
                $ql->save();
                $request->session()->put('thongbao', 'Cập nhật thành công');
            }
        }
        return redirect('/admin/issued');
    }


    public function delete_issued(Request $request){
        $cvu = noicap::find($request->nc_ma);
        $cvu->delete();
        
        $request->session()->put('thongbao', 'Xóa thành công');
        return redirect('/admin/issued');
    }
}

