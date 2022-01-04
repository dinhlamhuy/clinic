<?php

namespace App\Http\Controllers;

use App\Models\canlamsang;
use App\Models\nhomcanlamsang;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

session_start();
class CLSController extends Controller
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
    public function index()
    {
        $this->AuthLogin();
        $dscls = canlamsang::all();
        $dsncls = nhomcanlamsang::all();
        return view('admin.ad_subclinical',compact('dscls','dsncls'));
    }
    public function add_subclinical(Request $request)
    {
        $result = DB::table('canlamsang')->where('cls_ten', $request->cls_ten)->first();
        if ($result) {
            $request->session()->put('thongbao', 'Đã tồn tại');
        } else {
            $cls = new canlamsang;
            $cls->cls_ten = $request->cls_ten;
            $cls->ncls_ma = $request->ncls_ma;
            $cls->cls_giabhyt = $request->cls_giabhyt;
            $cls->cls_giadv = $request->cls_giadv;
            $cls->cls_tienchenhlech = $request->cls_tienchenhlech;
            $cls->save();

            $request->session()->put('thongbao', 'Thêm mới thành công');
        }
        return redirect('/admin/subclinical');
    }
    public function edit_subclinical(Request $request)
    {
        $result = DB::table('canlamsang')->where('cls_ma', $request->cls_ma)->where('cls_ten', $request->cls_ten)->where('ncls_ma', $request->ncls_ma)
        ->where('cls_giabhyt', $request->cls_giabhyt)->where('cls_giadv', $request->cls_giadv)->where('cls_tienchenhlech', $request->cls_tienchenhlech)->first();
        if ($result) {
        }else {
            
            $kttrungten = DB::table('canlamsang')->where('cls_ma', '<>', $request->cls_ma)->where('cls_ten', $request->cls_ten)->first();
            if ($kttrungten) {
                $request->session()->put('thongbao', 'Đã tồn tại');

            } else {
                $cls = new canlamsang;
                $cls = canlamsang::find($request->cls_ma);
                $cls->cls_ten  =  $request->cls_ten;
                $cls->ncls_ma  =  $request->ncls_ma;
                $cls->cls_giabhyt  =  $request->cls_giabhyt;
                $cls->cls_giadv  =  $request->cls_giadv;
                $cls->cls_tienchenhlech  =  $request->cls_tienchenhlech;
                $cls->save();
                $request->session()->put('thongbao', 'Cập nhật thành công');
            }
        }
        
        return redirect('/admin/subclinical');
    }
    public function delete_subclinical(Request $request){
        $cls = canlamsang::find($request->cls_ma);
        $cls->delete();
        
        $request->session()->put('thongbao', 'Xóa thành công');
        return redirect('/admin/subclinical');
    }
}
