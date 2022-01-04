<?php

namespace App\Http\Controllers;

use App\Models\nhomcanlamsang;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

session_start();
class NhomCLSController extends Controller
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
        $dsncls = Nhomcanlamsang::all();
        return view('admin.ad_group_subclinical')->with('dsnhomcls', $dsncls);
    }
    public function add_group_subclinical(Request $request)
    {

        $result = DB::table('nhomcanlamsang')->where('ncls_ten', $request->tennhom)->first();
        if ($result) {
            $request->session()->put('thongbao', 'Đã tồn tại');
        } else {
            $nhomcls = new nhomcanlamsang;
            $nhomcls->ncls_ten = $request->tennhom;
            $nhomcls->save();

            $request->session()->put('thongbao', 'Thêm mới thành công');
        }
        return redirect('/admin/group_subclinical');
    }
    public function edit_group_subclinical(Request $request)
    {
        $result = DB::table('nhomcanlamsang')->where('ncls_ma', $request->manhom)->where('ncls_ten', $request->tennhom)->first();
        if ($result) {
        }else {
            
            $kttrungten = DB::table('nhomcanlamsang')->where('ncls_ma', '<>', $request->manhom)->where('ncls_ten', $request->tennhom)->first();
            if ($kttrungten) {
                $request->session()->put('thongbao', 'Đã tồn tại');

            } else {
                $ncls = new nhomcanlamsang;
                $ncls = nhomcanlamsang::find($request->manhom);
                $ncls->ncls_ten  =  $request->tennhom;
                $ncls->save();
                $request->session()->put('thongbao', 'Cập nhật thành công');
            }
        }
        
        return redirect('/admin/group_subclinical');
    }
    public function delete_group_subclinical(Request $request){
        $ncls = nhomcanlamsang::find($request->manhom);
        $ncls->delete();
        
        $request->session()->put('thongbao', 'Xóa thành công');
        return redirect('/admin/group_subclinical');
    }
}
