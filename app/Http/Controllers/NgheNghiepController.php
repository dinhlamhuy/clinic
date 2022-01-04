<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nghenghiep;
use Illuminate\Support\Facades\DB;

session_start();

class NgheNghiepController extends Controller
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
        $dsnghenghiep = nghenghiep::all();
        return view('admin.ad_job',compact('dsnghenghiep'));
    }

    public function add_job(Request $request)
    {

        $result = DB::table('nghenghiep')->where('nn_ten', $request->tennghenghiep)->first();
        if ($result) {
            $request->session()->put('thongbao', 'Đã tồn tại');
        } else {
            $nghe = new nghenghiep;
            $nghe->nn_ten = $request->tennghenghiep;
            $nghe->save();

            $request->session()->put('thongbao', 'Thêm mới thành công');
        }
        return redirect('/admin/job');
    }

    public function edit_job(Request $request)
    {
        $result = DB::table('nghenghiep')->where('nn_ma', $request->nn_ma)->where('nn_ten', $request->nn_ten)->first();
        if ($result) {
        }else {
            
            $kttrungten = DB::table('nghenghiep')->where('nn_ma', '<>', $request->nn_ma)->where('nn_ten', $request->nn_ten)->first();
            if ($kttrungten) {
                $request->session()->put('thongbao', 'Đã tồn tại');

            } else {
                $nghe = new nghenghiep;
                $nghe = nghenghiep::find($request->nn_ma);
                $nghe->nn_ten  =  $request->nn_ten;
                $nghe->save();
                $request->session()->put('thongbao', 'Cập nhật thành công');
            }
        }
        return redirect('/admin/job');
    }

    public function delete_job(Request $request){
        $nghe = nghenghiep::find($request->nn_ma);
        $nghe->delete();
        
        $request->session()->put('thongbao', 'Xóa thành công');
        return redirect('/admin/job');
    }
}
