<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

session_start();
class DangNhapNVController extends Controller
{
    public function AuthLoginNV()
    {
       

        $p_ma = session()->get('p_ma');
        $nv_ma = session()->get('nv_ma');
       
        if ($nv_ma) {
            if ($p_ma == '1') {
                //    Tiếp tân
                return redirect('/staff/receive');
            } else if ($p_ma == '2') {
                // Thu ngân
                return redirect('/staff/cashier');
            } else if ($p_ma == '3') {
                // Phát thuốc
                return redirect('/staff/medicine_supply');
            } else if ($p_ma == '4' || $p_ma == '5' || $p_ma == '6' || $p_ma == '7') {
                // Khám bệnh
                return redirect('/staff/medical_examination');
            } else if ($p_ma == '10' || $p_ma == '9' ||  $p_ma == '8') {

                return redirect('/staff/subclinical_examination');
            }
        } else {
            return redirect('staff/st_login')->send();
        }
    }
    public function thumucgoc(){
        return redirect('staff/st_login');
    }
    public function index()
    {
        // $this->AuthLoginNV();
        return view('staff.st_login');
    }
    public function login(Request $request)
    {
        $tentaikhoan = $request->tentaikhoan;
        $mk = $request->matkhau;
        $result = DB::table('nhanvien')
            ->join('chitietnhanvienphong', 'chitietnhanvienphong.nv_ma', '=', 'nhanvien.nv_ma')
            ->join('phong', 'phong.p_ma', '=', 'chitietnhanvienphong.p_ma')
            ->join('chitietnhanvien', 'chitietnhanvien.nv_ma', '=', 'nhanvien.nv_ma')
            ->join('chucvu', 'chucvu.cv_ma', '=', 'chitietnhanvien.cv_ma')
            ->where('nv_trangthai','=', '1')
            ->where('nv_tentaikhoan', $tentaikhoan)
            ->wherenull('chitietnhanvienphong.ngayketthuc')
            ->first();
        
        if ($result) {
            if (Hash::check($mk, $result->nv_matkhau)) {
                // var_dump($result); die();
                $request->session()->put('p_ma', $result->p_ma);
                $request->session()->put('p_ten', $result->p_ten);
                $request->session()->put('cv_ma', $result->cv_ma);
                $request->session()->put('cv_ten', $result->cv_ten);
                $request->session()->put('nv_ma', $result->nv_ma);
                $request->session()->put('nv_ten', $result->nv_ten);
                $request->session()->put('nv_tentaikhoan', $result->nv_tentaikhoan);
                if ($result->p_ma == '1') {
                    //    Tiếp tân
                    return redirect('/staff/receive');
                } else if ($result->p_ma == '2') {
                    // Thu ngân
                    return redirect('/staff/cashier');
                } else if ($result->p_ma == '3') {
                    // Phát thuốc
                    return redirect('/staff/medicine_supply');
                } else if ($result->p_ma == '4' || $result->p_ma == '5' || $result->p_ma == '6' || $result->p_ma == '7') {
                    // Khám bệnh
                    return redirect('/staff/medical_examination');
                } else if ($result->p_ma == '9' ||  $result->p_ma == '8' ||  $result->p_ma == '10') {

                    return redirect('/staff/subclinical_examination');
                }
            } else {

                $request->session()->put('mess', 'Kiểm tra lại mật khẩu của bạn nhé');
                return redirect('/staff/st_login');
            }
        } else {
            
            $request->session()->put('mess', 'Tài khoản chưa tồn tại hoặc đã bị khóa');
            return redirect('/staff/st_login');
        }
    }
    public function nv_logout(Request $request)
    {
        $this->AuthLoginNV();
        $request->session()->put('p_ma', null);
        $request->session()->put('p_ten', null);
        $request->session()->put('cv_ma', null);
        $request->session()->put('cv_ten', null);
        $request->session()->put('nv_ma', null);
        $request->session()->put('nv_ten', null);
        $request->session()->put('nv_tentaikhoan', null);
        return redirect('/staff/st_login');
    }
}
