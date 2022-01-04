<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\chucvu;
use Illuminate\Support\Facades\DB;

session_start();
class ChucVuController extends Controller
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
        $dschucvu = chucvu::all();
        return view('admin.ad_position',compact('dschucvu'));
    }

    public function add_position(Request $request)
    {

        $result = DB::table('chucvu')->where('cv_ten', $request->tenchucvu)->first();
        if ($result) {
            $request->session()->put('thongbao', 'Đã tồn tại');
        } else {
            $cvu = new chucvu;
            $cvu->cv_ten = $request->tenchucvu;
            $cvu->save();

            $request->session()->put('thongbao', 'Thêm mới thành công');
        }
        return redirect('/admin/position');
    }

    public function edit_position(Request $request)
    {
        $result = DB::table('chucvu')->where('cv_ma', $request->cv_ma)->where('cv_ten', $request->cv_ten)->first();
        if ($result) {
        }else {
            
            $kttrungten = DB::table('chucvu')->where('cv_ma', '<>', $request->cv_ma)->where('cv_ten', $request->cv_ten)->first();
            if ($kttrungten) {
                $request->session()->put('thongbao', 'Đã tồn tại');

            } else {
                $cvu = new chucvu;
                $cvu = chucvu::find($request->cv_ma);
                $cvu->cv_ten  =  $request->cvten;
                $cvu->save();
                $request->session()->put('thongbao', 'Cập nhật thành công');
            }
        }
        return redirect('/admin/position');
    }

    public function delete_position(Request $request){
        $cvu = chucvu::find($request->cvu_ma);
        $cvu->delete();
        
        $request->session()->put('thongbao', 'Xóa thành công');
        return redirect('/admin/position');
    }
}