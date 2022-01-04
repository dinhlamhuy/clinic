<?php

namespace App\Http\Controllers;


use App\Models\Nhomthuoc;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

session_start();

class NhomThuocController extends Controller
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
        $dsnthuoc = Nhomthuoc::all();
        return view('admin.ad_group_medicine')->with('dsnhomthuoc', $dsnthuoc);
    }
    public function add_group_medicine(Request $request)
    {

        $result = DB::table('nhomthuoc')->where('nt_ten', $request->tennhom)->first();
        if ($result) {
            $request->session()->put('thongbao', 'Đã tồn tại');
        } else {
            $nhomthuoc = new Nhomthuoc;
            $nhomthuoc->nt_ten = $request->tennhom;
            // $nhomthuoc->nt_ghichu = $request->ghichu;
            $nhomthuoc->save();

            $request->session()->put('thongbao', 'Thêm mới thành công');
        }
        return redirect('/admin/group_medicine');
    }
    public function edit_group_medicine(Request $request)
    {
        $result = DB::table('nhomthuoc')->where('nt_ma', $request->manhom)->where('nt_ten', $request->tennhom)->first();
        if ($result) {
        }else {
            
            $kttrungten = DB::table('nhomthuoc')->where('nt_ma', '<>', $request->manhom)->where('nt_ten', $request->tennhom)->first();
            if ($kttrungten) {
                $request->session()->put('thongbao', 'Đã tồn tại');

            } else {
                $nthuoc = new Nhomthuoc;
                $nthuoc = Nhomthuoc::find($request->manhom);
                $nthuoc->nt_ten  =  $request->tennhom;
                // $nthuoc->nt_ghichu  =  $request->ghichu;
                $nthuoc->save();
                $request->session()->put('thongbao', 'Cập nhật thành công');
            }
        }
        
        return redirect('/admin/group_medicine');
    }
    public function delete_group_medicine(Request $request){
        $nthuoc = Nhomthuoc::find($request->manhom);
        $nthuoc->delete();
        
        $request->session()->put('thongbao', 'Xóa thành công');
        return redirect('/admin/group_medicine');
    }
}
