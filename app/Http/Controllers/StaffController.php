<?php

namespace App\Http\Controllers;
use App\Models\phong;
use App\Models\chucvu;
use App\Models\nhanvien;
use App\Models\chitietnhanvien;
use App\Models\chitietnhanvienphong;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
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

    public function index(){
        $this->AuthLogin();
        $dsphong = phong::all();
        $dschitietnhanvien = chitietnhanvien::all();
        // $dsnhanvien = nhanvien::all();
        $dsctnvien = chitietnhanvien::all();
        $dschucvu = chucvu::all(); 
        $dsnhanvien=DB::table('nhanvien')
        ->join('chitietnhanvien','chitietnhanvien.nv_ma','=','nhanvien.nv_ma')
        ->join('chucvu','chucvu.cv_ma','=','chitietnhanvien.cv_ma')
        ->join('chitietnhanvienphong','chitietnhanvienphong.nv_ma','=','nhanvien.nv_ma')
        ->join('phong','phong.p_ma','=','chitietnhanvienphong.p_ma')
        ->wherenull('chitietnhanvienphong.ngayketthuc')
        ->select('*','nhanvien.created_at as ngaytaonv')
        ->get();
        return view('admin.ad_staff', compact('dsphong','dsnhanvien','dschucvu','dsctnvien'));
    }
    
    public function add_staff(Request $request)
    {

        $result = DB::table('nhanvien')->where('nv_ten', $request->nv_ten)->first();
        if ($result) {
            $request->session()->put('thongbao', 'Nhân viên đã tồn tại');
        } else {
            $name='';
            if ($request->hasFile('nvien_hinhanh')) {
                      $name = time().rand(1,100).'.'.$request->nvien_hinhanh->extension();
                      $request->nvien_hinhanh->move(public_path('imgnhanvien'), $name);  
                   }
            $nvien = new nhanvien ;
            $nvien ->nv_ten = $request->nvien_ten;
            $nvien ->nv_tentaikhoan = $request->nvien_tentaikhoan;
            $nvien ->nv_matkhau = Hash::make($request->nvien_matkhau);
            $nvien ->nv_hinhanh = $name;
            $nvien ->nv_sdt = $request->nvien_sdt;
            $nvien ->nv_gioitinh = $request->nvien_gioitinh;
            $nvien ->nv_ngaysinh = $request->nvien_ngaysinh;
            $nvien ->nv_cmnd = $request->nvien_cmnd;
            $nvien ->nv_email = $request->nvien_email;
            $nvien ->nv_diachi = $request->nvien_diachi;
            $nvien ->nv_trangthai = '1';
            // $nvien ->created_at = $request->nvien_ngaytao;
            // $nvien ->updated_at = $request->nvien_ngaycn;
            $nvien ->save();
            $id_nv=$nvien->nv_ma;
            $chitietnv=new chitietnhanvien;
            $chitietnv->nv_ma=$id_nv;
            $chitietnv->cv_ma=$request->cv_ma;
            $chitietnv->ngaybatdau=date('Y-m-d');
            $chitietnv->save();
            $chitietnvphong=new chitietnhanvienphong;
            $chitietnvphong->nv_ma=$id_nv;
            $chitietnvphong->p_ma=$request->p_ma;
            $chitietnvphong->ngaybatdau=date('Y-m-d');
            $chitietnvphong->save();


            $request->session()->put('thongbao', 'Thêm mới thành công');
        }
        return redirect('/admin/staff');
    }
    public function edit_staff(Request $request)
    {

        $result = DB::table('nhanvien')->where('nv_tentaikhoan', $request->nv_tentaikhoan)->first();
        if ($result) {
            $request->session()->put('thongbao', 'Nhân viên đã tồn tại');
        } else {

            $dsnv=DB::table('nhanvien')
        ->join('chitietnhanvien','chitietnhanvien.nv_ma','=','nhanvien.nv_ma')
        ->join('chitietnhanvienphong','chitietnhanvienphong.nv_ma','=','nhanvien.nv_ma')
            ->where('nhanvien.nv_ma','=',$request->nv_ma)
            ->wherenull('chitietnhanvienphong.ngayketthuc')
            ->first();
            $name=$dsnv->nv_hinhanh;
            if($request->hasFile('nvien_hinhanh')){
                $name = time().rand(1,100).'.'.$request->nvien_hinhanh->extension();
                $request->nvien_hinhanh->move(public_path('imgnhanvien'), $name); 
            }
            $matkhau=$dsnv->nv_matkhau;
            if(!empty($request->matkhau)){
                $matkhau=Hash::make($request->matkhau);
            }
            $editnv=DB::table('nhanvien')
            ->where('nhanvien.nv_ma','=',$request->nv_ma)
            ->update([
                'nv_ten'    =>  $request->hoten,
                'nv_tentaikhoan'    =>  $request->tentaikhoan,
                'nv_matkhau'    =>  $matkhau,
                'nv_gioitinh'    =>  $request->gioitinh,
                'nv_ngaysinh'    =>  $request->ngaysinh,
                'nv_sdt'    =>  $request->sdt,
                'nv_cmnd'    =>  $request->cmnd,
                'nv_email'    =>  $request->email,
                'nv_diachi'    =>  $request->diachi,
                'nv_hinhanh'    =>  $name,
                'nv_trangthai'    =>  $request->trangthai
            ]);
            if($request->chucvu != $dsnv->cv_ma){
                $editcv=DB::table('chitietnhanvien')
                ->where('chitietnhanvien.nv_ma','=',$request->nv_ma)
                ->update([
                    'ngayketthuc'    =>  date('Y-m-d')
                ]);
                $chitietnv=new chitietnhanvien;
                $chitietnv->nv_ma=$request->nv_ma;
                $chitietnv->cv_ma=$request->chucvu;
                $chitietnv->ngaybatdau=date('Y-m-d');
                $chitietnv->save();
            }
           
            if($request->phong != $dsnv->p_ma){
                $editcv=DB::table('chitietnhanvienphong')
                ->where('chitietnhanvienphong.nv_ma','=',$request->nv_ma)
                ->update([
                    'ngayketthuc'    =>  date('Y-m-d')
                ]);
                $chitietnvphong=new chitietnhanvienphong;
                $chitietnvphong->nv_ma=$request->nv_ma;
                $chitietnvphong->p_ma=$request->phong;
                $chitietnvphong->ngaybatdau=date('Y-m-d');
                $chitietnvphong->save();
            }
           
            $request->session()->put('thongbao', 'Cập nhật thành công');
        }
        return redirect('/admin/staff');
    }
}
