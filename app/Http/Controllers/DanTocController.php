<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dantoc;
use Illuminate\Support\Facades\DB;

session_start();

class DanTocController extends Controller
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
        $dsdantoc = dantoc::all();
        return view('admin.ad_nation',compact('dsdantoc'));
    }

    public function add_nation(Request $request)
    {

        $result = DB::table('dantoc')->where('dtoc_ten', $request->tendantoc)->first();
        if ($result) {
            $request->session()->put('thongbao', 'Đã tồn tại');
        } else {
            $dantoc = new dantoc;
            $dantoc->dtoc_ten = $request->tendantoc;
            $dantoc->save();

            $request->session()->put('thongbao', 'Thêm mới thành công');
        }
        return redirect('/admin/nation');
    }

    public function edit_nation(Request $request)
    {
        $result = DB::table('dantoc')->where('dtoc_ma', $request->dtoc_ma)->where('dtoc_ten', $request->dtoc_ten)->first();
        if ($result) {
        }else {
            
            $kttrungten = DB::table('dantoc')->where('dtoc_ma', '<>', $request->dtoc_ma)->where('dtoc_ten', $request->dtoc_ten)->first();
            if ($kttrungten) {
                $request->session()->put('thongbao', 'Đã tồn tại');

            } else {
                $dantoc = new dantoc;
                $dantoc = dantoc::find($request->dtoc_ma);
                $dantoc->dtoc_ten  =  $request->dtoc_ten;
                $dantoc->save();
                $request->session()->put('thongbao', 'Cập nhật thành công');
            }
        }
        return redirect('/admin/nation');
    }

    public function delete_nation(Request $request){
        $dantoc = dantoc::find($request->dtoc_ma);
        $dantoc->delete();
        
        $request->session()->put('thongbao', 'Xóa thành công');
        return redirect('/admin/nation');
    }
}
