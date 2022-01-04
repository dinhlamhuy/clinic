<?php

namespace App\Http\Controllers;

use App\Models\thuocgoc;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

session_start();

class ThuocGocController extends Controller
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
        $dsthuocgoc = thuocgoc::all();
        return view('admin.ad_generic_drug', compact('dsthuocgoc'));
    }
    public function add_generic_drug(Request $request)
    {
        $result = DB::table('thuocgoc')->where('tg_ten', $request->tg_ten)->first();
        if ($result) {
            $request->session()->put('thongbao', 'Đã tồn tại');
        } else {
            $cls = new thuocgoc;
            $cls->tg_ten = $request->tg_ten;
            $cls->save();

            $request->session()->put('thongbao', 'Thêm mới thành công');
        }
        return redirect('/admin/generic_drug');
    }
    public function edit_generic_drug(Request $request)
    {
        $result = DB::table('thuocgoc')->where('tg_ma', $request->tg_ma)->where('tg_ten', $request->tg_ten)->first();
        if ($result) {
        } else {

            $kttrungten = DB::table('thuocgoc')->where('tg_ma', '<>', $request->tg_ma)->where('tg_ten', $request->tg_ten)->first();
            if ($kttrungten) {
                $request->session()->put('thongbao', 'Đã tồn tại');
            } else {
                $tg = new thuocgoc;
                $tg = thuocgoc::find($request->tg_ma);
                $tg->tg_ten  =  $request->tg_ten;
                $tg->save();
                $request->session()->put('thongbao', 'Cập nhật thành công');
            }
        }

        return redirect('/admin/generic_drug');
    }
    public function delete_generic_drug(Request $request)
    {
        $tg = thuocgoc::find($request->tg_ma);
        $tg->delete();

        $request->session()->put('thongbao', 'Xóa thành công');
        return redirect('/admin/generic_drug');
    }
}
