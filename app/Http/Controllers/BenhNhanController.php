<?php

namespace App\Http\Controllers;
use App\Models\benhnhan;
use App\Models\dantoc;
use App\Models\quoctich;
use App\Models\nghenghiep;
use App\Models\thanhpho;
use App\Models\huyen;
use App\Models\xa;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BenhNhanController extends Controller
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
        $dsbenhnhan  = DB::table('benhnhan')
        // ->join('phieukhambenh','phieukhambenh.bn_ma','=','benhnhan.bn_ma')
        //     ->join('trangthaikham','trangthaikham.ttk_ma', '=', 'phieukhambenh.ttk_ma')
        ->join('quoctich', 'quoctich.qt_ma', '=', 'benhnhan.qt_ma')
        ->join('dantoc', 'dantoc.dtoc_ma', '=', 'benhnhan.dtoc_ma')
        ->join('xa', 'xa.x_ma', '=', 'benhnhan.x_ma')
        ->join('huyen', 'huyen.h_ma', '=', 'xa.h_ma')
        ->join('thanhpho', 'thanhpho.tp_ma', '=', 'huyen.tp_ma')
        // ->select('phong.*', 'nhanvien.*','phieukhambenh.*', 'benhnhan.*', 'trangthaikham.*')
        ->get();
        return view('admin.ad_patient')->with('dsbenhnhan', $dsbenhnhan);
    }
}
