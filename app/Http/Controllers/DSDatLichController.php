<?php

namespace App\Http\Controllers;

use App\Models\dangky;
use App\Models\nhanvien;
use App\Models\bhyt;
use App\Models\benhnhan;
use App\Models\quoctich;
use App\Models\dantoc;
use App\Models\xa;
use App\Models\thanhpho;
use App\Models\huyen;
use App\Models\phieukhambenh;
use App\Models\trieuchunglichhen;
use App\Models\lichhen;
use App\Models\lichtruc;
use App\Models\khunggio;
use App\Models\chitietlichhen;
use App\Models\nghenghiep;
use App\Models\phong;
use App\Models\loaihinhkham;
use App\Models\doituong;
use App\Models\quyenloi;
use App\Models\noicap;
use App\Models\trangthaikham;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

session_start();

class DSDatLichController extends Controller
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
            } else if ( $p_ma == '10' || $p_ma == '9' ||  $p_ma == '8') {

                return redirect('/staff/subclinical_examination');
            }
        } else {
            return redirect('staff/st_login')->send();
        }
    }
    public function index()
    {
        $this->AuthLoginNV();

        $dslichhen = DB::table('dangky')
            ->join('lichhen', 'dangky.dk_ma', '=', 'lichhen.dk_ma')
            ->join('trangthailichhen', 'trangthailichhen.ttlh_ma', '=', 'lichhen.ttlh_ma')
            ->join('khunggio', 'khunggio.kg_ma', '=', 'lichhen.kg_ma')
            ->join('buoi', 'khunggio.buoi_ma', '=', 'buoi.buoi_ma')
            ->select('dangky.*', 'lichhen.*', 'trangthailichhen.*', 'khunggio.*', 'buoi.*')
            ->get();


        $dsctlh = DB::table('chitietlichhen')
            ->join('trieuchunglichhen', 'trieuchunglichhen.tclh_ma', '=', 'chitietlichhen.tclh_ma')
            ->select('trieuchunglichhen.*', 'chitietlichhen.*')
            ->get();
        $dsnghenghiep = nghenghiep::all();
        $dsquoctich = quoctich::all();
        $dsdantoc = dantoc::all();
        $dsdoituong = doituong::all();
        $dsquyenloi = quyenloi::all();
        $dsnoicap = noicap::all();
        $dsthanhpho = thanhpho::all();
        $dshuyen = huyen::all();
        $dsxa = xa::all();
        $dsphong = phong::all();
        $dsloaihinhkham = loaihinhkham::all();
        $dskhunggio = khunggio::all();
        $dsbenhnhan = benhnhan::all();


        $dstiepnhan = DB::table('phieukhambenh')
            ->join('trangthaikham', 'trangthaikham.ttk_ma', '=', 'phieukhambenh.ttk_ma')
            ->join('phong', 'phong.p_ma', '=', 'phieukhambenh.p_ma')
            ->join('chitietnhanvienphong', 'chitietnhanvienphong.p_ma', '=', 'phong.p_ma')
            ->join('nhanvien', 'nhanvien.nv_ma', '=', 'chitietnhanvienphong.nv_ma')
            ->join('benhnhan', 'benhnhan.bn_ma', '=', 'phieukhambenh.bn_ma')
            ->select('phong.*',  'nhanvien.*', 'phieukhambenh.created_at as ngaylap', 'phieukhambenh.*', 'benhnhan.*', 'trangthaikham.*')
            ->get();
            // ->where('phieukhambenh.created_at','=',date('Y-m-d'))

        $dsbenhnhancu = DB::table('benhnhan')
            // ->join('phieukhambenh','phieukhambenh.bn_ma','=','benhnhan.bn_ma')
            //     ->join('trangthaikham','trangthaikham.ttk_ma', '=', 'phieukhambenh.ttk_ma')
            ->join('quoctich', 'quoctich.qt_ma', '=', 'benhnhan.qt_ma')
            ->join('dantoc', 'dantoc.dtoc_ma', '=', 'benhnhan.dtoc_ma')
            ->join('xa', 'xa.x_ma', '=', 'benhnhan.x_ma')
            ->join('huyen', 'huyen.h_ma', '=', 'xa.h_ma')
            ->join('thanhpho', 'thanhpho.tp_ma', '=', 'huyen.tp_ma')
            // ->select('phong.*', 'nhanvien.*','phieukhambenh.*', 'benhnhan.*', 'trangthaikham.*')
            ->get();


        $dsphieukhambenh = phieukhambenh::all();
        $dsbhyt = DB::table('benhnhan')
            ->join('bhyt', 'bhyt.bn_ma', '=', 'benhnhan.bn_ma')
            ->join('xa', 'xa.x_ma', '=', 'benhnhan.x_ma')
            ->join('huyen', 'huyen.h_ma', '=', 'xa.h_ma')
            ->join('thanhpho', 'thanhpho.tp_ma', '=', 'huyen.tp_ma')
            ->join('doituong', 'doituong.dt_ma', '=', 'bhyt.dt_ma')
            ->join('quyenloi', 'quyenloi.ql_ma', '=', 'bhyt.ql_ma')
            ->join('noicap', 'noicap.nc_ma', '=', 'bhyt.nc_ma')
            ->get();
        return view(
            'staff.st_receive',
            compact(
                'dsctlh',
                'dslichhen',
                'dsnghenghiep',
                'dsdoituong',
                'dsquyenloi',
                'dsnoicap',
                'dsthanhpho',
                'dshuyen',
                'dsxa',
                'dsquoctich',
                'dsdantoc',
                'dsphong',
                'dsloaihinhkham',
                'dskhunggio',
                'dsbenhnhan',
                'dstiepnhan',
                'dsbenhnhancu',
                'dsphieukhambenh',
                'dsbhyt'
            )
        );
    }
   
    public function dstiepnhan(){
        $this->AuthLoginNV();
        $dstiepnhan = DB::table('phieukhambenh')
            ->join('trangthaikham', 'trangthaikham.ttk_ma', '=', 'phieukhambenh.ttk_ma')
            ->join('phong', 'phong.p_ma', '=', 'phieukhambenh.p_ma')
            ->join('chitietnhanvienphong', 'chitietnhanvienphong.p_ma', '=', 'phong.p_ma')
            ->join('nhanvien', 'nhanvien.nv_ma', '=', 'chitietnhanvienphong.nv_ma')
            ->join('benhnhan', 'benhnhan.bn_ma', '=', 'phieukhambenh.bn_ma')
            ->select('phong.*',  'nhanvien.*', 'phieukhambenh.created_at as ngaylap', 'phieukhambenh.*', 'benhnhan.*', 'trangthaikham.*')
            ->get();
            // ->where('phieukhambenh.created_at','=',date('Y-m-d'))
        return view(
            'staff.st_receive_dstiepnhan',
            compact(
            
                'dstiepnhan',
                
            )
        );

    }
    public function dsdatlichhen(){
        $this->AuthLoginNV();
        $dslichhen = DB::table('dangky')
            ->join('lichhen', 'dangky.dk_ma', '=', 'lichhen.dk_ma')
            ->join('trangthailichhen', 'trangthailichhen.ttlh_ma', '=', 'lichhen.ttlh_ma')
            ->join('khunggio', 'khunggio.kg_ma', '=', 'lichhen.kg_ma')
            ->join('buoi', 'khunggio.buoi_ma', '=', 'buoi.buoi_ma')
            ->select('dangky.*', 'lichhen.*', 'trangthailichhen.*', 'khunggio.*', 'buoi.*' , 'lichhen.created_at as ngaydat')
            ->get();
        $dsctlh = DB::table('chitietlichhen')
            ->join('trieuchunglichhen', 'trieuchunglichhen.tclh_ma', '=', 'chitietlichhen.tclh_ma')
            ->select('trieuchunglichhen.*', 'chitietlichhen.*')
            ->get();
        $dsnghenghiep = nghenghiep::all();
        $dsquoctich = quoctich::all();
        $dsdantoc = dantoc::all();
        $dsdoituong = doituong::all();
        $dsquyenloi = quyenloi::all();
        $dsnoicap = noicap::all();
        $dsthanhpho = thanhpho::all();
        $dshuyen = huyen::all();
        $dsxa = xa::all();
        $dsphong = phong::all();
        $dsloaihinhkham = loaihinhkham::all();
        $dskhunggio = khunggio::all();
        $dsbenhnhan = benhnhan::all();
        $dsphieukhambenh = phieukhambenh::all();
        $dsbhyt = DB::table('benhnhan')
            ->join('bhyt', 'bhyt.bn_ma', '=', 'benhnhan.bn_ma')
            ->join('xa', 'xa.x_ma', '=', 'benhnhan.x_ma')
            ->join('huyen', 'huyen.h_ma', '=', 'xa.h_ma')
            ->join('thanhpho', 'thanhpho.tp_ma', '=', 'huyen.tp_ma')
            ->join('doituong', 'doituong.dt_ma', '=', 'bhyt.dt_ma')
            ->join('quyenloi', 'quyenloi.ql_ma', '=', 'bhyt.ql_ma')
            ->join('noicap', 'noicap.nc_ma', '=', 'bhyt.nc_ma')
            ->get();

            

        return view(
            'staff.st_receive_dsdatlichhen',
            compact(
                
                'dsctlh',
                'dslichhen',
                'dsnghenghiep',
                'dsdoituong',
                'dsquyenloi',
                'dsnoicap',
                'dsthanhpho',
                'dshuyen',
                'dsxa',
                'dsquoctich',
                'dsdantoc',
                'dsphong',
                'dsloaihinhkham',
                'dskhunggio',
                'dsphieukhambenh',
                'dsbhyt'
            )
        );

    }
    public function dsbenhnhan()
    {
        $this->AuthLoginNV();

        $dslichhen = DB::table('dangky')
            ->join('lichhen', 'dangky.dk_ma', '=', 'lichhen.dk_ma')
            ->join('trangthailichhen', 'trangthailichhen.ttlh_ma', '=', 'lichhen.ttlh_ma')
            ->join('khunggio', 'khunggio.kg_ma', '=', 'lichhen.kg_ma')
            ->join('buoi', 'khunggio.buoi_ma', '=', 'buoi.buoi_ma')
            ->select('dangky.*', 'lichhen.*', 'trangthailichhen.*', 'khunggio.*', 'buoi.*')
            ->get();


        $dsctlh = DB::table('chitietlichhen')
            ->join('trieuchunglichhen', 'trieuchunglichhen.tclh_ma', '=', 'chitietlichhen.tclh_ma')
            ->select('trieuchunglichhen.*', 'chitietlichhen.*')
            ->get();
        $dsnghenghiep = nghenghiep::all();
        $dsquoctich = quoctich::all();
        $dsdantoc = dantoc::all();
        $dsdoituong = doituong::all();
        $dsquyenloi = quyenloi::all();
        $dsnoicap = noicap::all();
        $dsthanhpho = thanhpho::all();
        $dshuyen = huyen::all();
        $dsxa = xa::all();
        $dsphong = phong::all();
        $dsloaihinhkham = loaihinhkham::all();
        $dskhunggio = khunggio::all();
        $dsbenhnhan = benhnhan::all();
        $dsbenhnhancu = DB::table('benhnhan')
            ->join('quoctich', 'quoctich.qt_ma', '=', 'benhnhan.qt_ma')
            ->join('dantoc', 'dantoc.dtoc_ma', '=', 'benhnhan.dtoc_ma')
            ->join('xa', 'xa.x_ma', '=', 'benhnhan.x_ma')
            ->join('huyen', 'huyen.h_ma', '=', 'xa.h_ma')
            ->join('thanhpho', 'thanhpho.tp_ma', '=', 'huyen.tp_ma')
            // ->select('phong.*', 'nhanvien.*','phieukhambenh.*', 'benhnhan.*', 'trangthaikham.*')
            ->get();


        $dsphieukhambenh = phieukhambenh::all();
        $dsbhyt = DB::table('benhnhan')
            ->join('bhyt', 'bhyt.bn_ma', '=', 'benhnhan.bn_ma')
            ->join('xa', 'xa.x_ma', '=', 'benhnhan.x_ma')
            ->join('huyen', 'huyen.h_ma', '=', 'xa.h_ma')
            ->join('thanhpho', 'thanhpho.tp_ma', '=', 'huyen.tp_ma')
            ->join('doituong', 'doituong.dt_ma', '=', 'bhyt.dt_ma')
            ->join('quyenloi', 'quyenloi.ql_ma', '=', 'bhyt.ql_ma')
            ->join('noicap', 'noicap.nc_ma', '=', 'bhyt.nc_ma')
            ->get();
        return view(
            'staff.st_receive_dsbenhnhan',
            compact(
                'dsctlh',
                'dslichhen',
                'dsnghenghiep',
                'dsdoituong',
                'dsquyenloi',
                'dsnoicap',
                'dsthanhpho',
                'dshuyen',
                'dsxa',
                'dsquoctich',
                'dsdantoc',
                'dsphong',
                'dsloaihinhkham',
                'dskhunggio',
                'dsbenhnhan',
                'dsbenhnhancu',
                'dsphieukhambenh',
                'dsbhyt'
            )
        );
    }
    public function confirmation_receive(Request $request)
    {
        $trangthai = new lichhen;
        $trangthai = lichhen::find($request->lichhen_ma);
        $trangthai->ttlh_ma = '2';
        $trangthai->save();
        $request->session()->put('thongbao', 'Xác nhận thành công');
        return redirect('/staff/dsdatlichhen');
    }
  


    public function loadquanhuyen(Request $request)
    {
        $huyen = DB::table('huyen')->where(
            'tp_ma',
            $request->tp_ma
        )->get();
        return response(['data' =>  $huyen]);
    }
    public function loadthixa(Request $request)
    {
        $xa = DB::table('xa')->where('h_ma', $request->h_ma)->get();
        return response(['data' =>  $xa]);
    }

    //Tạo hồ sơ bệnh nhân
    public function create_medical_records(Request $request)
    {
        $bn_ma='';
        if($request->benhnhan_ma!=''){
            $bn_ma=$request->benhnhan_ma;
        }
        $checkbhyt=DB::table('bhyt')
        ->where('dt_ma','=',$request->doituong)
        ->where('ql_ma','=',$request->quyenloi)
        ->where('nc_ma','=',$request->noicap)
        ->where('bhyt_maso','=',$request->bhyt)
        ->where('bn_ma','<>',$bn_ma)
        ->first();
        if($checkbhyt){
            $request->session()->put('thongbao', 'BHYT đã tồn tại');
            return  redirect()->back();
        }else{

            if ($request->benhnhan_ma == '') {
                $bn = new benhnhan;
                $bn->bn_ten = $request->hoten;
                $bn->bn_gioitinh = $request->gioitinh;
                $bn->bn_sdt = $request->sdt;
                $bn->bn_ngaysinh = $request->ngaysinh;
                $bn->bn_diachi = $request->diachi;
                $bn->bn_cmnd = $request->cmnd;
                $bn->bn_email = $request->email;
                $bn->qt_ma = $request->quoctich;
                $bn->nn_ma = $request->nghenghiep;
                $bn->dtoc_ma = $request->dantoc;
                $bn->x_ma = $request->xa;
                $bn->bn_matkhau = md5('123456');
                $bn->save();
                $id_bn = $bn->bn_ma;
            } else {
    
                $id_bn = $request->benhnhan_ma;
            }
            if (isset($request->lichhen_ma)) {
                $lichhen = lichhen::find($request->lichhen_ma);
                $lichhen->ttlh_ma = '3';
                $lichhen->bn_ma = $id_bn;
                $lichhen->save();
            }
            if (!empty($request->bhyt)) {
                $checkbhyt=DB::table('bhyt')
                ->where('dt_ma','=',$request->doituong)
                ->where('ql_ma','=',$request->quyenloi)
                ->where('nc_ma','=',$request->noicap)
                ->where('bhyt_maso','=',$request->bhyt)
                ->where('bn_ma','=',$id_bn)
                ->first();
                if($checkbhyt){}else{

                    $bhyt = new bhyt;
                    $bhyt->bn_ma = $id_bn;
                    $bhyt->dt_ma = $request->doituong;
                    $bhyt->ql_ma = $request->quyenloi;
                    $bhyt->nc_ma = $request->noicap;
                    $bhyt->bhyt_maso = $request->bhyt;
                    $bhyt->bhyt_ngaybatdau = $request->ngaybdbhyt;
                    $bhyt->bhyt_ngayketthuc = $request->ngayktbhyt;
                    $bhyt->save();
                }
                   
            }
    
            $pkb = new phieukhambenh;
            $pkb->bn_ma = $id_bn;
            $pkb->pkb_sttkham = $id_bn;
            $pkb->lhk_ma = $request->loaihinhkham;
            $pkb->p_ma = $request->phong;
            $pkb->ttk_ma = '1';
            $pkb->save();
            $request->session()->put('thongbao', 'Tạo thành công');
            return redirect('/staff/receive');
        }
    }
    //Tạo phieu kham cho benh nhan da tung kham 
    public function re_create_medical_records(Request $request)
    {
        $id_bn = $request->benhnhan_ma;
        $checkbhyt=DB::table('bhyt')
        ->where('dt_ma','=',$request->doituong)
        ->where('ql_ma','=',$request->quyenloi)
        ->where('nc_ma','=',$request->noicap)
        ->where('bhyt_maso','=',$request->bhyt)
        ->where('bn_ma','<>',$id_bn)
        ->first();
        if($checkbhyt){
            $request->session()->put('thongbao', 'BHYT đã tồn tại');
            return  redirect()->back();
        }else{
        
        $suathongtin = benhnhan::find($id_bn);
        $suathongtin->bn_sdt = $request->sdt;
        $suathongtin->bn_diachi = $request->diachi;
        $suathongtin->bn_cmnd = $request->cmnd;
        $suathongtin->nn_ma = $request->nghenghiep;
        $suathongtin->x_ma = $request->xa;
        $suathongtin->save();

        if (!empty($request->bhyt)) {
            $checkbhyt=DB::table('bhyt')
            ->where('dt_ma','=',$request->doituong)
            ->where('ql_ma','=',$request->quyenloi)
            ->where('nc_ma','=',$request->noicap)
            ->where('bhyt_maso','=',$request->bhyt)
            ->where('bn_ma','=',$id_bn)
            ->first();
            if($checkbhyt){}else{

                $bhyt = new bhyt;
                $bhyt->bn_ma = $id_bn;
                $bhyt->dt_ma = $request->doituong;
                $bhyt->ql_ma = $request->quyenloi;
                $bhyt->nc_ma = $request->noicap;
                $bhyt->bhyt_maso = $request->bhyt;
                $bhyt->bhyt_ngaybatdau = $request->ngaybdbhyt;
                $bhyt->bhyt_ngayketthuc = $request->ngayktbhyt;
                $bhyt->save();
            }
               
        }
    
        $pkb = new phieukhambenh;
        $pkb->bn_ma = $id_bn;
        $pkb->pkb_sttkham = $id_bn;
        $pkb->lhk_ma = $request->loaihinhkham;
        $pkb->p_ma = $request->phong;
       
        $pkb->ttk_ma = '1';
        $pkb->save();
        $request->session()->put('thongbao', 'Tạo thành công');
        return redirect('/staff/dsbenhnhan');
        }
    }

    public function print_medical_bill($id)
    {
        $phieukham = DB::table('phieukhambenh')
            ->join('loaihinhkham', 'loaihinhkham.lhk_ma', '=', 'phieukhambenh.lhk_ma')
            // ->join('lichtruc', 'lichtruc.p_ma', '=', 'phieukhambenh.p_ma')
            ->join('phong', 'phong.p_ma', '=', 'phieukhambenh.p_ma')
            ->join('chitietnhanvienphong', 'chitietnhanvienphong.p_ma', '=', 'phong.p_ma')
            ->join('nhanvien', 'nhanvien.nv_ma', '=', 'chitietnhanvienphong.nv_ma')
            ->join('benhnhan', 'benhnhan.bn_ma', '=', 'phieukhambenh.bn_ma')
            ->join('quoctich', 'quoctich.qt_ma', '=', 'benhnhan.qt_ma')
            ->join('dantoc', 'dantoc.dtoc_ma', '=', 'benhnhan.dtoc_ma')
            ->join('xa', 'xa.x_ma', '=', 'benhnhan.x_ma')
            ->join('huyen', 'huyen.h_ma', '=', 'xa.h_ma')
            ->join('thanhpho', 'thanhpho.tp_ma', '=', 'huyen.tp_ma')
            ->where('phieukhambenh.pkb_ma', $id)
            ->select(
                'phieukhambenh.*',
                'loaihinhkham.*',
                'phieukhambenh.created_at as ngaylap',
                'nhanvien.*',
                'phong.*',
                'benhnhan.*',
                'quoctich.*',
                'dantoc.*',
                'xa.*',
                'huyen.*',
                'thanhpho.*'
            )->first();
        return view('/staff/st_phieukhambenh', compact('phieukham'));
    }
    public function delete_receive(Request $request){
        $lh_ma=$request->lhen_ma;
       
        $xoalh=DB::table('lichhen')->where('lh_ma',$request->lhen_ma)->update(['ttlh_ma'    =>  '4']);
        $request->session()->put('thongbao', 'Hủy lịch hẹn thành công');

        return redirect('/staff/dsdatlichhen');

    }
}
