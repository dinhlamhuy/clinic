<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\bhyt;
use App\Models\benhnhan;
use App\Models\quoctich;
use App\Models\dantoc;
use App\Models\xa;
use App\Models\thanhpho;
use App\Models\huyen;
use App\Models\phieukhambenh;
use App\Models\trieuchung;
use App\Models\lichhen;
use App\Models\khunggio;
use App\Models\chitietlichhen;
use App\Models\nghenghiep;
use App\Models\othunhat;
use App\Models\othuhai;
use App\Models\othuba;
use App\Models\trangthaikham;

session_start();
class ThongTinBNController extends Controller
{
    public function AuthLogin()
    {
        $bn_ma = session()->get('bn_ma');
        if ($bn_ma) {
            return redirect('/clinic/profile_patient');
        } else {
            return redirect('/clinic/medical_register')->send();
        }
    }
    public function dangnhap(Request $request){
        $mabn =substr($request->bn_ma,2);
        $pass = md5($request->password);
        // sprintf('%04d',$number)
        $result = DB::table('benhnhan')->where('bn_ma', $mabn)->where('bn_matkhau', $pass)->first();
        if ($result) {
            
            $request->session()->put('bn_ma',$result->bn_ma);
            return redirect('/clinic/profile_patient');
        } else {
            $request->session()->put('mess','Kiểm tra đăng nhập lại bạn nhé');
            return view('website.ws_medical_register');
        }
    }
    public function thongtinbn(){
        $this->AuthLogin();
        $bn_ma = session()->get('bn_ma');
        $benhnhan = DB::table('benhnhan')
        ->join('nghenghiep', 'nghenghiep.nn_ma','=','benhnhan.nn_ma')
        ->join('dantoc', 'dantoc.dtoc_ma','=','benhnhan.dtoc_ma')
        ->join('quoctich', 'quoctich.qt_ma','=','benhnhan.qt_ma')
        ->join('xa', 'xa.x_ma','=','benhnhan.x_ma')
        ->join('huyen', 'huyen.h_ma','=','xa.h_ma')
        ->join('thanhpho', 'thanhpho.tp_ma','=','huyen.tp_ma')
        ->where('bn_ma', $bn_ma)->first();
        return view('website.ws_patient',compact('benhnhan'));
    }
    public function logoutbn(){
        $this->AuthLogin();
        session()->put('bn_ma', null);
        return view('website.ws_medical_register');
    }
}
