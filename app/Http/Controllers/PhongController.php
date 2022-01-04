<?php

namespace App\Http\Controllers;
use App\Models\phong;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PhongController extends Controller
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
        $dsphong = phong::all();
        return view('admin.ad_clinic')->with('dsphong', $dsphong);
    }

    public function add_clinic(Request $request)
    {

        $result = DB::table('phong')->where('p_ten', $request->tenphong)->first();
        if ($result) {
            $request->session()->put('thongbao', 'Đã tồn tại');
        } else {
            $phong = new phong;
            $phong->p_ten = $request->tenphong;
            $phong->save();
            $request->session()->put('thongbao', 'Thêm mới thành công');
        }
        return redirect('/admin/clinic');
    }
    public function edit_clinic(Request $request)
    {
        $result = DB::table('phong')->where('p_ma', $request->maphong)->where('p_ten', $request->tenphong)->first();
        if ($result) {
        }else {
            
            $kttrungten = DB::table('phong')->where('p_ma', '<>', $request->maphong)->where('p_ten', $request->tenphong)->first();
            if ($kttrungten) {
                $request->session()->put('thongbao', 'Đã tồn tại');

            } else {
                $phong = new phong;
                $phong = phong::find($request->maphong);
                $phong->p_ten  =  $request->tenphong;
                $phong->save();
                $request->session()->put('thongbao', 'Cập nhật thành công');
            }
        }
        
        return redirect('/admin/clinic');
    }
    public function delete_clinic(Request $request){
        $phong = phong::find($request->maphong);
        $phong->delete();
        
        $request->session()->put('thongbao', 'Xóa thành công');
        return redirect('/admin/clinic');
    }
}
