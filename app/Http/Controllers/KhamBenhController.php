<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\benhnhan;
use App\Models\lichhen;
use App\Models\trieuchunglichhen;
use App\Models\khunggio;
use App\Models\chitietlichhen;
use App\Models\bhyt;
use App\Models\phieukhambenh;
use App\Models\nghenghiep;
use App\Models\doituong;
use App\Models\quyenloi;
use App\Models\chiso;
use App\Models\chitietchiso;
use App\Models\trangthaikham;
use App\Models\trieuchungbenh;
use App\Models\benh;
use App\Models\thuoc;
use App\Models\donthuoc;
use App\Models\chitietdonthuoc;
use App\Models\chitietchidinh;
use App\Models\trieuchung;
use App\Models\chandoan;
use App\Models\benhphu;
use App\Models\phieuchidinh;

class KhamBenhController extends Controller
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
            } else if ($p_ma == '10' || $p_ma == '9' &&  $p_ma == '8') {

                return redirect('/staff/subclinical_examination');
            }
        } else {
            return redirect('staff/st_login')->send();
        }
    }
    public function index()
    {
        $this->AuthLoginNV();
        $dsbenhnhanchokham = DB::table('benhnhan')
            ->join('phieukhambenh', 'phieukhambenh.bn_ma', '=', 'benhnhan.bn_ma')
            ->join('trangthaikham', 'trangthaikham.ttk_ma', '=', 'phieukhambenh.ttk_ma')
            ->join('phong', 'phong.p_ma', '=', 'phieukhambenh.p_ma')
           
            ->where('phieukhambenh.ttk_ma', '2')
            ->whereDate('phieukhambenh.created_at', date('Y-m-d'))
            ->get();
        
        $dsbenhnhandakham = DB::table('benhnhan')
            ->join('phieukhambenh', 'phieukhambenh.bn_ma', '=', 'benhnhan.bn_ma')
            ->join('trangthaikham', 'trangthaikham.ttk_ma', '=', 'phieukhambenh.ttk_ma')
            ->join('phong', 'phong.p_ma', '=', 'phieukhambenh.p_ma')
            ->where('phieukhambenh.ttk_ma', '3')
            ->whereDate('phieukhambenh.created_at', date('Y-m-d'))
            ->get();
         $donthuoc=donthuoc::all();
        return view('staff.st_medical_examination', compact('donthuoc','dsbenhnhanchokham','dsbenhnhandakham'));
    }
    public function thongtinbn($id)
    {
        $this->AuthLoginNV();
        $dsbenhnhan = DB::table('benhnhan')
            ->join('phieukhambenh', 'phieukhambenh.bn_ma', '=', 'benhnhan.bn_ma')
            ->join('xa', 'xa.x_ma', '=', 'benhnhan.x_ma')
            ->join('huyen', 'huyen.h_ma', '=', 'xa.h_ma')
            ->join('thanhpho', 'thanhpho.tp_ma', '=', 'huyen.tp_ma')
            ->join('loaihinhkham','loaihinhkham.lhk_ma','=','phieukhambenh.lhk_ma')
            ->where('phieukhambenh.pkb_ma', $id)
            ->first();

            $bhytmoi=DB::table('benhnhan')
            ->join('phieukhambenh', 'phieukhambenh.bn_ma', '=', 'benhnhan.bn_ma')
            ->join('bhyt','bhyt.bn_ma','benhnhan.bn_ma')
            ->join('doituong','doituong.dt_ma','bhyt.dt_ma')
            ->join('quyenloi','quyenloi.ql_ma','bhyt.ql_ma')
            ->join('noicap','noicap.nc_ma','bhyt.nc_ma')
            ->where('phieukhambenh.pkb_ma', $id)
            ->orderBy('bhyt.created_at', 'DESC')
            ->first();
        $dsdonthuoc = DB::table('donthuoc')
            ->join('phieukhambenh', 'phieukhambenh.pkb_ma', '=', 'donthuoc.pkb_ma')
            ->join('chitietdonthuoc', 'chitietdonthuoc.dthuoc_ma', '=', 'donthuoc.dthuoc_ma')
            ->join('thuoc', 'thuoc.t_ma', '=', 'chitietdonthuoc.t_ma')
            ->join('cachsudung', 'cachsudung.csd_ma', '=', 'thuoc.csd_ma')
            ->where('phieukhambenh.pkb_ma', $id)
            ->select('donthuoc.*', 'phieukhambenh.*', 'thuoc.*', 'cachsudung.*', 'chitietdonthuoc.*', 'cachsudung.*', 'thuoc.t_ma as mathuoc')
            ->get();
        $dschiso = '';
        $chiso = DB::table('chitietchiso')
            ->join('chiso', 'chiso.cs_ma', '=', 'chitietchiso.cs_ma')
            ->join('phieukhambenh', 'phieukhambenh.pkb_ma', '=', 'chitietchiso.pkb_ma')
            ->where('chitietchiso.pkb_ma', '=', $id)
            ->get();
        if (!$chiso) {
            $dschiso = '';
        } else {
            $dschiso = $chiso;
        }
        $trieuchungbenh = trieuchungbenh::all();
        $dsbenh = benh::all();
        $dsthuoc = DB::table('thuoc')
            ->join('nhomthuoc', 'nhomthuoc.nt_ma', '=', 'thuoc.nt_ma')
            ->join('thuocgoc', 'thuocgoc.tg_ma', '=', 'thuoc.tg_ma')
            ->join('chitietlonhap', 'chitietlonhap.t_ma', '=', 'thuoc.t_ma')
            ->join('lonhapthuoc', 'lonhapthuoc.lnt_ma', '=', 'chitietlonhap.lnt_ma')
            ->join('donvitinhthuoc', 'donvitinhthuoc.dvtt_ma', '=', 'chitietlonhap.dvtt_ma')
            ->join('cachsudung', 'cachsudung.csd_ma', '=', 'thuoc.csd_ma')
            ->get();

        $trieuchung = DB::table('trieuchung')
            ->join('trieuchungbenh', 'trieuchungbenh.tcb_ma', '=', 'trieuchung.tcb_ma')
            ->join('donthuoc', 'donthuoc.dthuoc_ma', '=', 'trieuchung.dthuoc_ma')
            ->join('phieukhambenh', 'phieukhambenh.pkb_ma', '=', 'donthuoc.pkb_ma')
            ->where('phieukhambenh.pkb_ma', $id)
            ->get();
        $chuandoan = DB::table('chandoan')
            ->join('benh', 'benh.b_ma', '=', 'chandoan.b_ma')
            ->join('donthuoc', 'donthuoc.dthuoc_ma', '=', 'chandoan.dthuoc_ma')
            ->join('phieukhambenh', 'phieukhambenh.pkb_ma', '=', 'donthuoc.pkb_ma')
            ->where('phieukhambenh.pkb_ma', $id)
            ->orderBy('chandoan.b_ma','DESC')
            ->get();
        $benhphu = DB::table('benhphu')
            ->join('benh', 'benh.b_ma', '=', 'benhphu.b_ma')
            ->join('donthuoc', 'donthuoc.dthuoc_ma', '=', 'benhphu.dthuoc_ma')
            ->join('phieukhambenh', 'phieukhambenh.pkb_ma', '=', 'donthuoc.pkb_ma')
            ->where('phieukhambenh.pkb_ma', $id)
            ->get();
        $donthuoc = DB::table('donthuoc')
            ->join('phieukhambenh', 'phieukhambenh.pkb_ma', '=', 'donthuoc.pkb_ma')
            ->where('phieukhambenh.pkb_ma', $id)
            ->first();
        $bhyt = DB::table('bhyt')
            ->join('benhnhan', 'benhnhan.bn_ma', '=', 'bhyt.bn_ma')
            ->join('phieukhambenh', 'phieukhambenh.bn_ma', '=', 'benhnhan.bn_ma')
            ->where('phieukhambenh.pkb_ma', $id)
            ->first();

        $dscls = DB::table('nhomcanlamsang')
            ->join('canlamsang', 'canlamsang.ncls_ma', '=', 'nhomcanlamsang.ncls_ma')
            ->orderBy('canlamsang.ncls_ma', 'ASC')
            ->get();

        $lichsukham=DB::table('benhnhan')
        ->join('phieukhambenh', 'phieukhambenh.bn_ma', '=', 'benhnhan.bn_ma')
        ->where('benhnhan.bn_ma', $dsbenhnhan->bn_ma)
        ->where('phieukhambenh.ttk_ma', 3)
        ->select('*','phieukhambenh.created_at as ngaylap')
        ->get();

        $donthuoccu=DB::table('benhnhan')
        ->join('phieukhambenh', 'phieukhambenh.bn_ma', '=', 'benhnhan.bn_ma')
        ->join('donthuoc', 'donthuoc.pkb_ma', '=', 'phieukhambenh.pkb_ma')
        ->join('chitietdonthuoc', 'chitietdonthuoc.dthuoc_ma', '=', 'donthuoc.dthuoc_ma')
        ->join('thuoc', 'thuoc.t_ma', '=', 'chitietdonthuoc.t_ma')
        ->where('benhnhan.bn_ma', $dsbenhnhan->bn_ma)
        ->where('phieukhambenh.ttk_ma', 3)
        ->get();
        $trieuchungcu=DB::table('benhnhan')
        ->join('phieukhambenh', 'phieukhambenh.bn_ma', '=', 'benhnhan.bn_ma')
        ->join('donthuoc', 'donthuoc.pkb_ma', '=', 'phieukhambenh.pkb_ma')
        ->join('trieuchung', 'trieuchung.dthuoc_ma', '=', 'donthuoc.dthuoc_ma')
        ->join('chitiettrieuchung', 'chitiettrieuchung.tcb_ma', '=', 'trieuchung.tcb_ma')
        ->join('benh', 'benh.b_ma', '=', 'chitiettrieuchung.b_ma')
        ->where('benhnhan.bn_ma', $dsbenhnhan->bn_ma)
        ->where('phieukhambenh.ttk_ma', 3)
        ->get();
        $chandoancu=DB::table('benhnhan')
        ->join('phieukhambenh', 'phieukhambenh.bn_ma', '=', 'benhnhan.bn_ma')
        ->join('donthuoc', 'donthuoc.pkb_ma', '=', 'phieukhambenh.pkb_ma')
        ->join('chandoan', 'chandoan.dthuoc_ma', '=', 'donthuoc.dthuoc_ma')
        ->join('benh', 'benh.b_ma', '=', 'chandoan.b_ma')
        ->where('benhnhan.bn_ma', $dsbenhnhan->bn_ma)
        ->where('phieukhambenh.ttk_ma', 3)
        ->get();
        $chisocu=DB::table('chiso')
        ->join('chitietchiso','chitietchiso.cs_ma','=','chiso.cs_ma')
        ->join('phieukhambenh', 'phieukhambenh.pkb_ma', '=', 'chitietchiso.pkb_ma')
        ->where('phieukhambenh.bn_ma', $dsbenhnhan->bn_ma)
        ->where('phieukhambenh.ttk_ma', 3)
        ->get();
        $loaihinhkhamcu=DB::table('loaihinhkham')
        ->join('phieukhambenh', 'phieukhambenh.lhk_ma', '=', 'loaihinhkham.lhk_ma')
        ->get();
        $clscu=DB::table('chitietchidinh')
        ->join('canlamsang', 'canlamsang.cls_ma', '=', 'chitietchidinh.cls_ma')
        ->join('phieuchidinh', 'phieuchidinh.pcd_ma', '=', 'chitietchidinh.pcd_ma')
        ->join('phieukhambenh', 'phieukhambenh.pkb_ma', '=', 'phieuchidinh.pkb_ma')
        ->where('phieukhambenh.ttk_ma', 3)
        ->get();

        return view('staff.st_medical_exam', compact('clscu','bhytmoi','loaihinhkhamcu','dschiso','chisocu','lichsukham','donthuoccu','trieuchungcu','chandoancu', 'dscls', 'bhyt', 'dsbenhnhan', 'trieuchungbenh', 'dsbenh', 'dsthuoc', 'dsdonthuoc', 'chuandoan', 'trieuchung', 'donthuoc', 'benhphu'));
    }
    public function bocthuoc(Request $request)
    {
        $lnt_ma = $request->lnt_ma;
        $t_ma = $request->t_ma;
        $id_donthuoc = '';
        $giathuoc = '';
        $benhnhan = DB::table('donthuoc')
            ->join('phieukhambenh', 'phieukhambenh.pkb_ma', '=', 'donthuoc.pkb_ma')
            ->where('donthuoc.pkb_ma', $request->pkb_ma)
            ->first();
        $thuoc = DB::table('thuoc')
            ->join('cachsudung', 'cachsudung.csd_ma', '=', 'thuoc.csd_ma')
            ->where('thuoc.t_ma', $request->t_ma)
            ->first();

        $phieukhambenh = DB::table('phieukhambenh')
            ->where('phieukhambenh.pkb_ma', $request->pkb_ma)
            ->first();

        if (!$benhnhan) {
            $toathuoc = new donthuoc;
            $toathuoc->pkb_ma = $request->pkb_ma;
            $toathuoc->ldt_ma = $phieukhambenh->lhk_ma;
            $toathuoc->dthuoc_loidan = '';
            $toathuoc->dthuoc_trangthai = '0';
            $toathuoc->save();
            $id_donthuoc = $toathuoc->dthuoc_ma;
        } else {
            $id_donthuoc = $benhnhan->dthuoc_ma;
        }
       
        $cttoathuoc = new chitietdonthuoc;
        $cttoathuoc->dthuoc_ma = $id_donthuoc;
        $cttoathuoc->t_ma = $request->t_ma;
        $cttoathuoc->lnt_ma = $request->lnt_ma;
        $cttoathuoc->ctdt_lieudung = $thuoc->t_lieudung;
        if ($phieukhambenh->lhk_ma == "1") {

            $giathuoc = $thuoc->t_giabhyt;
        } else if ($phieukhambenh->lhk_ma == "2") {
            $giathuoc = $thuoc->t_giadv;
        }
        $cttoathuoc->ctdt_giaban = $giathuoc;
        $cttoathuoc->ctdt_soluong = '1';
        $cttoathuoc->save();

        $ld='';
        if(!empty($thuoc->t_lieudung)){
            $ld=$thuoc->t_lieudung;
        }
        return response([
            'lnt_ma'    =>  $lnt_ma,
            'donthuoc'    =>  $id_donthuoc,
            't_ten'    =>  $thuoc->t_ten,
            't_ma'    =>  $thuoc->t_ma,
            'csd_ten'    =>  $thuoc->csd_ten,
            'lieudung_ten'    =>  $ld,
            'id'    =>  $id_donthuoc

        ]);
    }
    public function editthuoc(Request $request)
    {
        $vitri = $request->vitri;
        // $request->thuoc;
        // $request->donthuoc;
        // $request->noidung;

        if ($vitri == 'ctdt_soluong') {
            // $ctdonthuoc->ctdt_soluong = $request->noidung;
            DB::table('chitietdonthuoc')
                ->where('t_ma', $request->thuoc)
                ->where('dthuoc_ma', $request->donthuoc)
                ->update(['ctdt_soluong' => $request->noidung]);
        } else  if ($vitri == 'ctdt_lieudung') {
            DB::table('chitietdonthuoc')
                ->where('t_ma', $request->thuoc)
                ->where('dthuoc_ma', $request->donthuoc)
                ->update(['ctdt_lieudung' => $request->noidung]);
            // $ctdonthuoc->ctdt_lieudung = $request->noidung;
        }

        return response([
            'vitri'    =>   $request->vitri,
            'thuoc'    =>  $request->thuoc,
            'donthuoc'    =>  $request->donthuoc,
            'noidung'    =>  $request->noidung,

        ]);
    }
    public function deletethuoc(Request $request)
    {
       
       
       
            DB::table('chitietdonthuoc')
                ->where('t_ma', $request->thuoc)
                ->where('dthuoc_ma', $request->donthuoc)
                ->delete();
        

        return response([
           
            'thuoc'    =>  $request->thuoc,
            'donthuoc'    =>  $request->donthuoc,
           
        ]);
    }

    public function chiso(Request $request)
    {
        $huyetap = $request->huyetap;
        $cannang = $request->cannang;
        $nhiptim = $request->nhiptim;
        $nhietdo = $request->nhietdo;
        $chieucao = $request->chieucao;
        $nhommau = $request->nhommau;
        $pkb_ma = $request->pkb_ma;

        $checkpkb = DB::table('phieukhambenh')
            ->join('chitietchiso', 'chitietchiso.pkb_ma', '=', 'phieukhambenh.pkb_ma')
            ->where('chitietchiso.pkb_ma', $pkb_ma)
            ->first();

        if ($checkpkb) {
            $update = DB::table('chitietchiso')->where('chitietchiso.pkb_ma', $pkb_ma)
                ->where('cs_ma', '1')->update(['ctcs_chitiet'  => $huyetap]);
            $update = DB::table('chitietchiso')->where('chitietchiso.pkb_ma', $pkb_ma)
                ->where('cs_ma', '2')->update(['ctcs_chitiet'  => $nhiptim]);
            $update = DB::table('chitietchiso')->where('chitietchiso.pkb_ma', $pkb_ma)
                ->where('cs_ma', '3')->update(['ctcs_chitiet'  => $cannang]);
            $update = DB::table('chitietchiso')->where('chitietchiso.pkb_ma', $pkb_ma)
                ->where('cs_ma', '4')->update(['ctcs_chitiet'  => $nhietdo]);
            $update = DB::table('chitietchiso')->where('chitietchiso.pkb_ma', $pkb_ma)
                ->where('cs_ma', '5')->update(['ctcs_chitiet'  => $chieucao]);
            $update = DB::table('chitietchiso')->where('chitietchiso.pkb_ma', $pkb_ma)
                ->where('cs_ma', '6')->update(['ctcs_chitiet'  => $nhommau]);
        } else {
            $update = DB::table('chitietchiso')->insert([
                ['cs_ma' => '1', 'pkb_ma' =>    $pkb_ma,    'ctcs_chitiet'  => $huyetap],
                ['cs_ma' => '2', 'pkb_ma' =>    $pkb_ma,    'ctcs_chitiet'  => $nhiptim],
                ['cs_ma' => '3', 'pkb_ma' =>    $pkb_ma,    'ctcs_chitiet'  => $cannang],
                ['cs_ma' => '4', 'pkb_ma' =>    $pkb_ma,    'ctcs_chitiet'  => $nhietdo],
                ['cs_ma' => '5', 'pkb_ma' =>    $pkb_ma,    'ctcs_chitiet'  => $chieucao],
                ['cs_ma' => '6', 'pkb_ma' =>    $pkb_ma,    'ctcs_chitiet'  => $nhommau],

            ]);
        }
        return response([
            'huyetap'    =>   $huyetap,
            'cannang'    =>  $cannang,
            'nhiptim'    =>  $nhiptim,
            'nhietdo'    =>  $nhietdo,
            'chieucao'    =>  $chieucao,
            'nhommau'    =>  $nhommau,
            'pkb_ma'    =>  $pkb_ma,
        ]);
    }
    //tạo đơn thuốc
    public function donthuoc(Request $request)
    {
        // chuandoan
        // trieuchung
        // benhphu
        // donthuoc
        $benhnhan = DB::table('donthuoc')
            ->join('phieukhambenh', 'phieukhambenh.pkb_ma', '=', 'donthuoc.pkb_ma')
            ->where('donthuoc.pkb_ma', $request->pkb_ma)
            ->first();


        $phieukhambenh = DB::table('phieukhambenh')
            ->where('phieukhambenh.pkb_ma', $request->pkb_ma)
            ->first();
        $id_donthuoc = '';
        if (!$benhnhan) {
            $toathuoc = new donthuoc;
            $toathuoc->pkb_ma = $request->pkb_ma;
            $toathuoc->ldt_ma = $phieukhambenh->lhk_ma;
            $toathuoc->dthuoc_loidan = $request->loidan;
            $toathuoc->dthuoc_loihen = $request->loihen;
            $toathuoc->dthuoc_trangthai = '0';
            $toathuoc->save();
            $id_donthuoc = $toathuoc->dthuoc_ma;
        } else {
            $id_donthuoc = $benhnhan->dthuoc_ma;
            $updatetoathuoc = donthuoc::find($id_donthuoc);
            $updatetoathuoc->dthuoc_loidan = $request->loidan;
            $updatetoathuoc->dthuoc_loihen = $request->loihen;
            $updatetoathuoc->save();

            $trieuchung = DB::table('trieuchung')
                ->join('trieuchungbenh', 'trieuchungbenh.tcb_ma', '=', 'trieuchung.tcb_ma')
                ->join('donthuoc', 'donthuoc.dthuoc_ma', '=', 'trieuchung.dthuoc_ma')
                ->where('donthuoc.dthuoc_ma', $id_donthuoc)
                ->delete();
            $chuandoan = DB::table('chandoan')
                ->join('benh', 'benh.b_ma', '=', 'chandoan.b_ma')
                ->join('donthuoc', 'donthuoc.dthuoc_ma', '=', 'chandoan.dthuoc_ma')
                ->where('donthuoc.dthuoc_ma', $id_donthuoc)
                ->delete();
            $benhphu = DB::table('benhphu')
                ->join('benh', 'benh.b_ma', '=', 'benhphu.b_ma')
                ->join('donthuoc', 'donthuoc.dthuoc_ma', '=', 'benhphu.dthuoc_ma')
                ->where('donthuoc.dthuoc_ma', $id_donthuoc)
                ->delete();
        }
        $tc_ma = [];
        foreach ($request->trieuchung as $tc) {

            $tc_ma[] = ['tcb_ma'  =>  $tc, 'dthuoc_ma'    =>  $id_donthuoc];
        }


        $cd_ma = [];
        foreach ($request->chandoan as $cd) {

            $cd_ma[] = ['b_ma'  =>  $cd, 'dthuoc_ma'    =>  $id_donthuoc, 'created_at'  =>  date('Y-m-d'), 'updated_at'  =>  date('Y-m-d')];
        }
        if (!empty($request->benhphu)) {
            $bp_ma = [];
            foreach ($request->benhphu as $bp) {
                $bp_ma[] = ['b_ma'  =>  $bp, 'dthuoc_ma'    =>  $id_donthuoc];
            }
            $benhphu = DB::table('benhphu')->insert($bp_ma);
        }
        $tchung = DB::table('trieuchung')->insert($tc_ma);
        $chandoan = DB::table('chandoan')->insert($cd_ma);


        return response([
            // 'tc_chuoi'    =>   $tc_ma,
            // 'cd_chuoi'    =>   $cd_ma,
            // 'bp_chuoi'    =>   $bp_ma,
            'id_donthuoc'    =>   $id_donthuoc

        ]);
    }


    public function toathuoc($id)
    {

        $dsthuoc = DB::table('donthuoc')
            ->join('phieukhambenh', 'phieukhambenh.pkb_ma', '=', 'donthuoc.pkb_ma')
            ->join('loaihinhkham', 'loaihinhkham.lhk_ma', '=', 'phieukhambenh.lhk_ma')
            ->join('benhnhan', 'benhnhan.bn_ma', '=', 'phieukhambenh.pkb_ma')
            ->join('xa', 'xa.x_ma', '=', 'benhnhan.x_ma')
            ->join('huyen', 'huyen.h_ma', '=', 'xa.h_ma')
            ->join('thanhpho', 'thanhpho.tp_ma', '=', 'huyen.tp_ma')
            ->join('loaidonthuoc', 'loaidonthuoc.ldt_ma', '=', 'donthuoc.ldt_ma')
            ->join('chitietdonthuoc', 'chitietdonthuoc.dthuoc_ma', '=', 'donthuoc.dthuoc_ma')
            ->join('thuoc', 'thuoc.t_ma', '=', 'chitietdonthuoc.t_ma')
            ->join('cachsudung', 'cachsudung.csd_ma', '=', 'thuoc.csd_ma')
            ->join('chandoan', 'chandoan.dthuoc_ma', '=', 'donthuoc.dthuoc_ma')
            ->join('benh', 'benh.b_ma', '=', 'chandoan.b_ma')
            ->join('bhyt', 'bhyt.bn_ma', '=', 'benhnhan.bn_ma')
            ->join('doituong', 'doituong.dt_ma', '=', 'bhyt.dt_ma')
            ->join('quyenloi', 'quyenloi.ql_ma', '=', 'bhyt.ql_ma')
            ->join('noicap', 'noicap.nc_ma', '=', 'bhyt.nc_ma')
            ->where('phieukhambenh.pkb_ma', $id)
            ->get();
        $donthuoc = DB::table('donthuoc')
            ->join('phieukhambenh', 'phieukhambenh.pkb_ma', '=', 'donthuoc.pkb_ma')
            ->join('loaihinhkham', 'loaihinhkham.lhk_ma', '=', 'phieukhambenh.lhk_ma')
            ->join('benhnhan', 'benhnhan.bn_ma', '=', 'phieukhambenh.bn_ma')
            ->join('xa', 'xa.x_ma', '=', 'benhnhan.x_ma')
            ->join('huyen', 'huyen.h_ma', '=', 'xa.h_ma')
            ->join('thanhpho', 'thanhpho.tp_ma', '=', 'huyen.tp_ma')
            ->join('loaidonthuoc', 'loaidonthuoc.ldt_ma', '=', 'donthuoc.ldt_ma')
            ->where('phieukhambenh.pkb_ma', $id)
            ->select('*', 'donthuoc.created_at as ngaylap')
            ->first();

        $bhyt = DB::table('phieukhambenh')
            ->join('bhyt', 'bhyt.bn_ma', '=', 'phieukhambenh.bn_ma')
            ->join('doituong', 'doituong.dt_ma', '=', 'bhyt.dt_ma')
            ->join('quyenloi', 'quyenloi.ql_ma', '=', 'bhyt.ql_ma')
            ->join('noicap', 'noicap.nc_ma', '=', 'bhyt.nc_ma')
            ->where('phieukhambenh.pkb_ma', $id)->first();

        $chuandoan = DB::table('chandoan')
            ->join('benh', 'benh.b_ma', '=', 'chandoan.b_ma')
            ->join('donthuoc', 'donthuoc.dthuoc_ma', '=', 'chandoan.dthuoc_ma')
            ->join('phieukhambenh', 'phieukhambenh.pkb_ma', '=', 'donthuoc.pkb_ma')
            ->where('phieukhambenh.pkb_ma', $id)
            ->orderBy('chandoan.b_ma','DESC')
            ->get();
        $ketoa = DB::table('donthuoc')
            ->join('phieukhambenh', 'phieukhambenh.pkb_ma', '=', 'donthuoc.pkb_ma')
            ->join('loaidonthuoc', 'loaidonthuoc.ldt_ma', '=', 'donthuoc.ldt_ma')
            ->join('chitietdonthuoc', 'chitietdonthuoc.dthuoc_ma', '=', 'donthuoc.dthuoc_ma')
            ->join('thuoc', 'thuoc.t_ma', '=', 'chitietdonthuoc.t_ma')
            ->join('chitietlonhap', 'chitietlonhap.t_ma', '=', 'thuoc.t_ma')
            ->join('donvitinhthuoc', 'donvitinhthuoc.dvtt_ma', '=', 'chitietlonhap.dvtt_ma')
            ->join('cachsudung', 'cachsudung.csd_ma', '=', 'thuoc.csd_ma')
            ->where('phieukhambenh.pkb_ma', $id)

            ->get();
        return view('staff.st_toathuoc', compact('donthuoc', 'bhyt', 'chuandoan', 'ketoa'));
    }
    public function hoanthanhdonthuoc(Request $request)
    {
        $hoanthanh = phieukhambenh::find($request->pkbenh_ma);
        $hoanthanh->ttk_ma = '3';
        $hoanthanh->save();
        return redirect('/staff/medical_examination');
    }

    public function chidinhcls(Request $request)
    {
        $gia = 0;

        $pkb_ma = $request->mapkb;
        $mapcd = '';
        $check = DB::table('phieuchidinh')
            ->join('phieukhambenh', 'phieukhambenh.pkb_ma', '=', 'phieuchidinh.pkb_ma')
            ->where('phieuchidinh.pkb_ma', $pkb_ma)->first();

        if (!$check) {
            $taophieu = new phieuchidinh;
            $taophieu->pkb_ma = $pkb_ma;
            $taophieu->pcd_trangthai = '0';
            $taophieu->save();
            $mapcd = $taophieu->pcd_ma;
        } else {
            $mapcd = $check->pcd_ma;
        }
        $loaihinhkham = DB::table('phieuchidinh')
            ->join('phieukhambenh', 'phieukhambenh.pkb_ma', '=', 'phieuchidinh.pkb_ma')
            ->where('phieuchidinh.pkb_ma', $pkb_ma)->first();
         
        $phongkham = '';
        foreach ($request->macls as $cls) {
            $nhomcls = DB::table('canlamsang')
                ->join('nhomcanlamsang', 'nhomcanlamsang.ncls_ma', '=', 'canlamsang.ncls_ma')
                ->where('canlamsang.cls_ma', $cls)
                ->first();
            if ($nhomcls->ncls_ma == '1') {
                $phongkham = '9';
            } else if ($nhomcls->ncls_ma == '2') {
                $phongkham = '8';
            }else if ($nhomcls->ncls_ma == '3') {
                $phongkham = '10';
            }
            
            if($loaihinhkham->lhk_ma=='1'){
                $gia=$nhomcls->cls_giabhyt;
            }else if($loaihinhkham->lhk_ma=='2'){
                $gia=$nhomcls->cls_giadv;
            }
            $ctchidinh = new chitietchidinh;
            $ctchidinh->cls_ma = $cls;
            $ctchidinh->pcd_ma = $mapcd;
            $ctchidinh->p_ma = $phongkham;
            $ctchidinh->ctcd_giatien = $gia;
            $ctchidinh->save();
        }
        return response([
            'alert' =>  'Thành công'
        ]);
    }
    public function phieuchidinh($id)
    {
        $dscls = DB::table('phieukhambenh')
            ->join('benhnhan', 'benhnhan.bn_ma', '=', 'phieukhambenh.bn_ma')
            ->join('phieuchidinh', 'phieuchidinh.pkb_ma', '=', 'phieukhambenh.pkb_ma')
            ->join('chitietchidinh', 'chitietchidinh.pcd_ma', '=', 'phieuchidinh.pcd_ma')
            ->join('phong', 'phong.p_ma', '=', 'chitietchidinh.p_ma')
            ->join('chitietnhanvienphong', 'chitietnhanvienphong.p_ma', '=', 'phong.p_ma')
            ->join('nhanvien', 'nhanvien.nv_ma', '=', 'chitietnhanvienphong.nv_ma')
            ->join('canlamsang', 'canlamsang.cls_ma', '=', 'chitietchidinh.cls_ma')
            ->join('nhomcanlamsang', 'nhomcanlamsang.ncls_ma', '=', 'canlamsang.ncls_ma')
            ->where('phieukhambenh.pkb_ma', $id)
            ->get();
        $benhnhan = DB::table('phieukhambenh')
            ->join('loaihinhkham', 'loaihinhkham.lhk_ma', '=', 'phieukhambenh.lhk_ma')
            ->join('benhnhan', 'benhnhan.bn_ma', '=', 'phieukhambenh.bn_ma')
            ->join('xa', 'xa.x_ma', '=', 'benhnhan.x_ma')
            ->join('huyen', 'huyen.h_ma', '=', 'xa.h_ma')
            ->join('thanhpho', 'thanhpho.tp_ma', '=', 'huyen.tp_ma')
            ->join('phieuchidinh', 'phieuchidinh.pkb_ma', '=', 'phieukhambenh.pkb_ma')

            ->join('phong','phong.p_ma','=','phieukhambenh.p_ma')
            ->join('chitietnhanvienphong','chitietnhanvienphong.p_ma','=','phong.p_ma')
            ->join('nhanvien','nhanvien.nv_ma','=','chitietnhanvienphong.nv_ma')
            ->join('chitietnhanvien','chitietnhanvien.nv_ma','=','nhanvien.nv_ma')
            ->join('chucvu','chucvu.cv_ma','=','chitietnhanvien.cv_ma')
            
            

            ->where('phieukhambenh.pkb_ma', $id)
            ->select('*','phieukhambenh.created_at as ngaylap')
            ->first();
        
        $checkbhyt = DB::table('phieukhambenh')
            ->join('benhnhan', 'benhnhan.bn_ma', '=', 'phieukhambenh.bn_ma')
            ->join('bhyt', 'bhyt.bn_ma', '=', 'benhnhan.bn_ma')
            ->join('doituong', 'doituong.dt_ma', '=', 'bhyt.dt_ma')
            ->join('quyenloi', 'quyenloi.ql_ma', '=', 'bhyt.ql_ma')
            ->join('noicap', 'noicap.nc_ma', '=', 'bhyt.nc_ma')
            ->where('phieukhambenh.pkb_ma', $id)
            ->first();

        
        return view('staff.st_phieuchidinh', compact('dscls','benhnhan','checkbhyt'));
    }


    
}
