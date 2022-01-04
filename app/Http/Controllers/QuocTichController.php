<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\quoctich;
use Illuminate\Support\Facades\DB;

session_start();
class QuocTichController extends Controller
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
        $dsquoctich = quoctich::all();
        return view('admin.ad_nationality',compact('dsquoctich'));
    }

    public function add_nationality(Request $request)
    {

        $result = DB::table('quoctich')->where('qt_ten', $request->tenquoctich)->first();
        if ($result) {
            $request->session()->put('thongbao', 'Đã tồn tại');
        } else {
            $quoctich = new quoctich;
            $quoctich->qt_ten = $request->tenquoctich;
            $quoctich->save();

            $request->session()->put('thongbao', 'Thêm mới thành công');
        }
        return redirect('/admin/nationality');
    }

    public function edit_nationality(Request $request)
    {
        $result = DB::table('quoctich')->where('qt_ma', $request->qt_ma)->where('qt_ten', $request->qt_ten)->first();
        if ($result) {
        }else {
            
            $kttrungten = DB::table('quoctich')->where('qt_ma', '<>', $request->qt_ma)->where('qt_ten', $request->qt_ten)->first();
            if ($kttrungten) {
                $request->session()->put('thongbao', 'Đã tồn tại');

            } else {
                $quoctich = new quoctich;
                $quoctich = quoctich::find($request->qt_ma);
                $quoctich->qt_ten  =  $request->qt_ten;
                $quoctich->save();
                $request->session()->put('thongbao', 'Cập nhật thành công');
            }
        }
        return redirect('/admin/nationality');
    }

    public function delete_nationality(Request $request){
        $quoctich = quoctich::find($request->qt_ma);
        $quoctich->delete();
        
        $request->session()->put('thongbao', 'Xóa thành công');
        return redirect('/admin/nationality');
    }
}