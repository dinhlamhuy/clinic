<?php

namespace App\Http\Controllers;

use App\Models\nhombenh;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

session_start();

class NhomBenhController extends Controller
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
        $dsnhombenh = nhombenh::all();
        // var_dump($dsnhombenh);
        return view('admin.ad_group_diseases', compact('dsnhombenh'));
    }
    public function add_group_diseases(Request $request)
    {

        $result = DB::table('nhombenh')->where('nb_ten', $request->tennhom)->first();
        if ($result) {
            $request->session()->put('thongbao', 'Đã tồn tại');
        } else {
            $nhombenh = new nhombenh;
            $nhombenh->nb_ten = $request->tennhom;
           
            $nhombenh->save();

            $request->session()->put('thongbao', 'Thêm mới thành công');
        }
        return redirect('/admin/group_diseases');
    }
    public function edit_group_diseases(Request $request)
    {
        $result = DB::table('nhombenh')->where('nb_ma', $request->manhom)->where('nb_ten', $request->tennhom)->first();
        if ($result) {
        }else {
            
            $kttrungten = DB::table('nhombenh')->where('nb_ma', '<>', $request->manhom)->where('nb_ten', $request->tennhom)->first();
            if ($kttrungten) {
                $request->session()->put('thongbao', 'Đã tồn tại');

            } else {
                $nthuoc = new nhombenh;
                $nthuoc = nhombenh::find($request->manhom);
                $nthuoc->nb_ten  =  $request->tennhom;
                
                $nthuoc->save();
                $request->session()->put('thongbao', 'Cập nhật thành công');
            }
        }
        
        return redirect('/admin/group_diseases');
    }
    public function delete_group_diseases(Request $request){
        $nthuoc = nhombenh::find($request->manhom);
        $nthuoc->delete();
        
        $request->session()->put('thongbao', 'Xóa thành công');
        return redirect('/admin/group_diseases');
    }
}
