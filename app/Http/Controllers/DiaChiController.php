<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\thanhpho;
use App\Models\huyen;
use App\Models\xa;
use Illuminate\Support\Facades\DB;

session_start();

class DiaChiController extends Controller
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

    public function city()
    {
        $this->AuthLogin();
        $dsthanhpho = thanhpho::all();
        return view('admin.ad_city',compact('dsthanhpho'));
    }

    public function add_city(Request $request)
    {

        $result = DB::table('thanhpho')->where('tp_ten', $request->tenthanhpho)->first();
        if ($result) {
            $request->session()->put('thongbao', 'Đã tồn tại');
        } else {
            $nghe = new thanhpho;
            $nghe->tp_ten = $request->tenthanhpho;
            $nghe->save();

            $request->session()->put('thongbao', 'Thêm mới thành công');
        }
        return redirect('/admin/city');
    }

    public function edit_city(Request $request)
    {
        $result = DB::table('thanhpho')->where('tp_ma', $request->tp_ma)->where('tp_ten', $request->tp_ten)->first();
        if ($result) {
        }else {
            
            $kttrungten = DB::table('thanhpho')->where('tp_ma', '<>', $request->tp_ma)->where('tp_ten', $request->tp_ten)->first();
            if ($kttrungten) {
                $request->session()->put('thongbao', 'Đã tồn tại');

            } else {
                $nghe = new thanhpho;
                $nghe = thanhpho::find($request->tp_ma);
                $nghe->tp_ten  =  $request->tp_ten;
                $nghe->save();
                $request->session()->put('thongbao', 'Cập nhật thành công');
            }
        }
        return redirect('/admin/city');
    }

    public function delete_city(Request $request){
        $nghe = thanhpho::find($request->tp_ma);
        $nghe->delete();
        
        $request->session()->put('thongbao', 'Xóa thành công');
        return redirect('/admin/city');
    }


    public function district()
    {
        $this->AuthLogin();
        $dsthanhpho = thanhpho::all();
        $dshuyen = DB::table('thanhpho')
        ->join('huyen','huyen.tp_ma','=','thanhpho.tp_ma')
        ->get();
        return view('admin.ad_district',compact('dshuyen','dsthanhpho'));
    }

    public function add_district(Request $request)
    {

        $result = DB::table('huyen')->where('tp_ma', $request->tp_ma)->where('h_ten', $request->tenhuyen)->first();
        if ($result) {
            $request->session()->put('thongbao', 'Đã tồn tại');
        } else {
            $nghe = new huyen;
            $nghe->tp_ma = $request->tp_ma;
            $nghe->h_ten = $request->tenhuyen;
            $nghe->save();

            $request->session()->put('thongbao', 'Thêm mới thành công');
        }
        return redirect('/admin/district');
    }

    public function edit_district(Request $request)
    {
        $result = DB::table('huyen')->where('tp_ma', $request->tp_ma)->where('h_ma', $request->h_ma)->where('h_ten', $request->h_ten)->first();
        if ($result) {
        }else {
            
            $kttrungten = DB::table('huyen')->where('tp_ma', $request->tp_ma)->where('h_ma', '<>', $request->h_ma)->where('h_ten', $request->h_ten)->first();
            if ($kttrungten) {
                $request->session()->put('thongbao', 'Đã tồn tại');

            } else {
                $nghe = new huyen;
                $nghe = huyen::find($request->h_ma);
                $nghe->tp_ma  =  $request->tp_ma;
                $nghe->h_ten  =  $request->h_ten;
                $nghe->save();
                $request->session()->put('thongbao', 'Cập nhật thành công');
            }
        }
        return redirect('/admin/district');
    }

    public function delete_district(Request $request){
        $nghe = huyen::find($request->h_ma);
        $nghe->delete();
        
        $request->session()->put('thongbao', 'Xóa thành công');
        return redirect('/admin/district');
    }
    public function loadquanhuyen(Request $request)
    {
        $huyen = DB::table('huyen')->where(
            'tp_ma',
            $request->tp_ma
        )->get();
        return response(['data' =>  $huyen]);
    }
    public function wards()
    {
        $this->AuthLogin();
        $dsthanhpho = thanhpho::all();
        $dshuyen = huyen::all();

        $dsxa =DB::table('xa')
        ->join('huyen','huyen.h_ma','=','xa.h_ma')
        ->join('thanhpho','thanhpho.tp_ma','=','huyen.tp_ma')
        ->get();
        return view('admin.ad_wards',compact('dsxa','dshuyen','dsthanhpho'));
    }

    public function add_wards(Request $request)
    {

        $result = DB::table('xa')->where('h_ma', $request->h_ma)->where('x_ten', $request->tenxa)->first();
        if ($result) {
            $request->session()->put('thongbao', 'Đã tồn tại');
        } else {
            $nghe = new xa;
            $nghe->h_ma = $request->h_ma;
            $nghe->x_ten = $request->tenxa;
            $nghe->save();

            $request->session()->put('thongbao', 'Thêm mới thành công');
        }
        return redirect('/admin/wards');
    }

    public function edit_wards(Request $request)
    {
        $result = DB::table('xa')->where('h_ma', $request->h_ma)->where('x_ma', $request->x_ma)->where('x_ten', $request->x_ten)->first();
        if ($result) {
        }else {
            
            $kttrungten = DB::table('xa')->where('h_ma', $request->h_ma)->where('x_ma', '<>', $request->x_ma)->where('x_ten', $request->x_ten)->first();
            if ($kttrungten) {
                $request->session()->put('thongbao', 'Đã tồn tại');

            } else {
                $xa = new xa;
                $xa = xa::find($request->x_ma);
                $xa->h_ma  =  $request->h_ma;
                $xa->x_ten  =  $request->x_ten;
                $xa->save();
                $request->session()->put('thongbao', 'Cập nhật thành công');
            }
        }
        return redirect('/admin/wards');
    }

    public function delete_wards(Request $request){
        $nghe = xa::find($request->x_ma);
        $nghe->delete();
        
        $request->session()->put('thongbao', 'Xóa thành công');
        return redirect('/admin/wards');
    }
}
