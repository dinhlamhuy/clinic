<?php

namespace App\Http\Controllers;
use App\Models\nhacungcap;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

session_start();
class NhaCungCapController extends Controller
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
        $dsnhacungcap = nhacungcap::all();
        return view('admin.ad_supplier')->with('dsnhacungcap', $dsnhacungcap);
    }
    
    public function add_supplier(Request $request)
    {

        $result = DB::table('nhacungcap')->where('ncc_ten', $request->ncc_ten)->first();
        if ($result) {
            $request->session()->put('thongbao', 'Đã tồn tại');
        } else {
            $nhacungcap = new nhacungcap;
            $nhacungcap->ncc_ten = $request->ncc_ten;
            $nhacungcap->ncc_sdt = $request->ncc_sdt;
            $nhacungcap->ncc_email = $request->ncc_email;
            $nhacungcap->ncc_diachi = $request->ncc_diachi;
            $nhacungcap->save();

            $request->session()->put('thongbao', 'Thêm mới thành công');
        }
        return redirect('/admin/supplier');
    }
    public function edit_supplier(Request $request)
    {
        $result = DB::table('nhacungcap')->where('ncc_ma', $request->ncc_ma)->where('ncc_ten', $request->ncc_ten)->where('ncc_sdt', $request->ncc_sdt)->where('ncc_email', $request->ncc_email)->where('ncc_diachi', $request->ncc_diachi)->first();
        if ($result) {
        }else {
            
            $kttrungten = DB::table('nhacungcap')->where('ncc_ma', '<>', $request->ncc_ma)->where('ncc_ten', $request->ncc_ten)
            ->where('ncc_sdt', $request->ncc_sdt)->where('ncc_email', $request->ncc_email)->where('ncc_diachi', $request->ncc_diachi)->first();
            if ($kttrungten) {
                $request->session()->put('thongbao', 'Đã tồn tại');

            } else {
                $ncc = new nhacungcap;
                $ncc = nhacungcap::find($request->ncc_ma);
                $ncc->ncc_ten  =  $request->ncc_ten;
                $ncc->ncc_sdt = $request->ncc_sdt;
                $ncc->ncc_email = $request->ncc_email;
                $ncc->ncc_diachi = $request->ncc_diachi;
                $ncc->save();
                $request->session()->put('thongbao', 'Cập nhật thành công');
            }
        }
        
        return redirect('/admin/supplier');
    }
    public function delete_supplier(Request $request){
        $ncc = nhacungcap::find($request->ncc_ma);
        $ncc->delete();
        
        $request->session()->put('thongbao', 'Xóa thành công');
        return redirect('/admin/supplier');
    }
}
