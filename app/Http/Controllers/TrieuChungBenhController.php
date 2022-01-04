<?php

namespace App\Http\Controllers;

use App\Models\trieuchungbenh;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

session_start();
class TrieuChungBenhController extends Controller
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
        $dstcbenh = trieuchungbenh::all();
        return view('admin.ad_disease_symptoms')->with('dstcbenh', $dstcbenh);
    }
    public function add_disease_symptoms(Request $request)
    {

        $result = DB::table('trieuchungbenh')->where('tcb_ten', $request->tennhom)->first();
        if ($result) {
            $request->session()->put('thongbao', 'Đã tồn tại');
        } else {
            $tcbenh = new trieuchungbenh;
            $tcbenh->tcb_ten = $request->tennhom;
            $tcbenh->save();

            $request->session()->put('thongbao', 'Thêm mới thành công');
        }
        return redirect('/admin/disease_symptoms');
    }
    public function edit_disease_symptoms(Request $request)
    {
        $result = DB::table('trieuchungbenh')->where('tcb_ma', $request->matcb)->where('tcb_ten', $request->tennhom)->first();
        if ($result) {
        } else {

            $kttrungten = DB::table('trieuchungbenh')->where('tcb_ma', '<>', $request->matcb)->where('tcb_ten', $request->tennhom)->first();
            if ($kttrungten) {
                $request->session()->put('thongbao', 'Đã tồn tại');
            } else {
                $tcb = new trieuchungbenh;
                $tcb = trieuchungbenh::find($request->matcb);
                $tcb->tcb_ten  =  $request->tennhom;
                $tcb->save();
                $request->session()->put('thongbao', 'Cập nhật thành công');
            }
        }

        return redirect('/admin/disease_symptoms');
    }
    public function delete_disease_symptoms(Request $request)
    {
        $tcb = trieuchungbenh::find($request->matcb);
        $tcb->delete();

        $request->session()->put('thongbao', 'Xóa thành công');
        return redirect('/admin/disease_symptoms');
    }
}
