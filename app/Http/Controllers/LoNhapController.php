<?php

namespace App\Http\Controllers;

use App\Models\lonhapthuoc;

use App\Models\nhacungcap;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

session_start();
class LoNhapController extends Controller
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
        $dslonhapthuoc = lonhapthuoc::all();
        $dsncc = nhacungcap::all();
        $tonggialonhap=DB::table('chitietlonhap')
        ->select('lnt_ma', DB::raw('SUM(ctlnt_gianhap*ctlnt_slchua) as tonggiatri'))
                ->groupBy('lnt_ma')
                ->get();
        return view('admin.ad_import_medicine', compact('dslonhapthuoc','dsncc','tonggialonhap'));
    }
    public function add_import_medicine(Request $request)
    {

        $result = DB::table('lonhapthuoc')->where('lnt_ten', $request->lnt_ten)->where('ncc_ma', $request->ncc_ma)->first();
        if ($result) {
            $request->session()->put('thongbao', 'Đã tồn tại');
        } else {
            $lonhapthuoc = new lonhapthuoc;
            $lonhapthuoc->lnt_ten = $request->lnt_ten;
            $lonhapthuoc->ncc_ma = $request->ncc_ma;
            // $lonhapthuoc->lnt_ngaynhap = $request->lnt_ngaynhap;
            $lonhapthuoc->lnt_ghichu = $request->lnt_ghichu;

            $lonhapthuoc->save();

            $request->session()->put('thongbao', 'Thêm mới thành công');
        }
        return redirect('/admin/import_medicine');
    }
    public function edit_import_medicine(Request $request)
    {
        $result = DB::table('lonhapthuoc')->where('lnt_ma', $request->lnt_ma)->where('lnt_ten', $request->lnt_ten)->where('lnt_ghichu', $request->lnt_ghichu)->where('ncc_ma', $request->ncc_ma)->first();
        if ($result) {
        } else {

            $kttrungten = DB::table('lonhapthuoc')->where('lnt_ma', '<>', $request->lnt_ma)->where('lnt_ten', $request->lnt_ten)->first();
            if ($kttrungten) {
                $request->session()->put('thongbao', 'Đã tồn tại');
            } else {
                $lonhapthuoc = new lonhapthuoc;
                $lonhapthuoc = lonhapthuoc::find($request->lnt_ma);
                $lonhapthuoc->lnt_ten  =  $request->lnt_ten;
                $lonhapthuoc->ncc_ma  =  $request->ncc_ma;
                $lonhapthuoc->lnt_ghichu  =  $request->lnt_ghichu;

                $lonhapthuoc->save();
                $request->session()->put('thongbao', 'Cập nhật thành công');
            }
        }

        return redirect('/admin/import_medicine');
    }
    public function delete_import_medicine(Request $request)
    {
        $lonhapthuoc = lonhapthuoc::find($request->lnt_ma);
        $lonhapthuoc->delete();

        $request->session()->put('thongbao', 'Xóa thành công');
        return redirect('/admin/import_medicine');
    }
}
