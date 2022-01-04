<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\dangky;
use App\Models\benhnhan;
use App\Models\lichhen;
use App\Models\trieuchunglichhen;
use App\Models\khunggio;
use App\Models\chitietlichhen;
use App\Models\bhyt;
use App\Models\quoctich;
use App\Models\dantoc;
use App\Models\xa;
use App\Models\thanhpho;
use App\Models\huyen;
use App\Models\phieukhambenh;
use App\Models\nghenghiep;
use App\Models\doituong;
use App\Models\quyenloi;
use App\Models\noicap;
use App\Models\trangthaikham;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

session_start();

class DKKhamBenhController extends Controller
{

    public function AuthLoginBN()
    {
        $bn_ma = session()->get('bn_ma');
        if ($bn_ma) {
            return redirect('/clinic/profile_patient');
        } else {
            return redirect('/clinic/medical_register')->send();
        }
    }
    public function dangnhap(Request $request)
    {
        $mabn = substr($request->bn_ma, 2);
        $pass = md5($request->password);

        $result = DB::table('benhnhan')->where('bn_ma', $mabn)->where('bn_matkhau', $pass)->first();
        if ($result) {

            $request->session()->put('bn_ma', $result->bn_ma);
            $request->session()->put('tbao', 'Đăng nhập thành công');
            return redirect('/clinic/profile_patient');
        } else {
            $request->session()->put('tbao', 'Đăng nhập thất bại');
            return  redirect('/clinic/medical_register');
        }
    }

    public function medical_register()
    {
        // $this->AuthLoginBN();
        $dstc = trieuchunglichhen::all();
        $dskg = khunggio::all();

        return view('website.ws_medical_register', compact('dstc', 'dskg'));
    }
    public function add_medical_register(Request $request)
    {
        $dkkham = new dangky;
        $dkkham->dk_hotennd = $request->dk_hotennd;
        $dkkham->dk_sdtnd = $request->dk_sdtnd;
        $dkkham->dk_emailnd = $request->dk_emailnd;
        $dkkham->dk_hoten = $request->dk_hoten;
        $dkkham->dk_diachi = $request->dk_diachi;
        $dkkham->dk_gioitinh = $request->dk_gioitinh;
        $dkkham->dk_ngaysinh = $request->dk_ngaysinh;
        $dkkham->dk_sdt = $request->dk_sdt;
        $dkkham->dk_email = $request->dk_email;
        $dkkham->save();

        $id_dkkham = $dkkham->dk_ma;
        $dklichhen = new lichhen;
        $dklichhen->dk_ma = $id_dkkham;
        $dklichhen->ttlh_ma = '1';
        $dklichhen->lh_ngay = $request->lh_ngaykham;
        $dklichhen->kg_ma = $request->kg_ma;
        $dklichhen->save();

        $idlichhen = $dklichhen->lh_ma;
        if (isset($request->trieuchung)) {
            foreach ($request->trieuchung as $tc) {
                $ctlichhen = new chitietlichhen;
                $ctlichhen->tclh_ma = $tc;
                $ctlichhen->lh_ma = $idlichhen;
                $ctlichhen->save();
            }
        }

        $request->session()->put('thongbao', 'Đăng ký thành công');

        return redirect('/clinic/medical_register');
    }

    public function register_for_re_examination(Request $request)
    {

        // $id=$request->bn_ma;
        $timdk_ma = DB::table('lichhen')
            // ->join('dangky','dangky.dk_ma','=','lichhen.dk_ma')
            ->where('bn_ma', $request->bn_ma)
            ->first();
        $bn = DB::table('benhnhan')
            ->where('bn_ma', $request->bn_ma)
            ->first();
        $id_dk = '';
        if (empty($timdk_ma->dk_ma)) {
            $dkkham = new dangky;
            $dkkham->dk_hoten = $bn->bn_ten;
            $dkkham->dk_diachi = $bn->bn_diachi;
            $dkkham->dk_gioitinh = $bn->bn_gioitinh;
            $dkkham->dk_ngaysinh = $bn->bn_ngaysinh;
            $dkkham->dk_sdt = $request->sdt;
            // $dkkham->dk_email = $request->dk_email;
            $dkkham->save();
            $id_dk = $dkkham->dk_ma;
        } else {
            $id_dk = $timdk_ma->dk_ma;
        }
        $dklichhen = new lichhen;
        $dklichhen->dk_ma = $id_dk;
        $dklichhen->ttlh_ma = '1';
        $dklichhen->bn_ma = $request->bn_ma;
        $dklichhen->lh_ngay = $request->lh_ngay;
        $dklichhen->kg_ma = $request->kg_ma;
        $dklichhen->save();

        $idlichhen = $dklichhen->lh_ma;

        foreach ($request->trieuchung as $tc) {
            $ctlichhen = new chitietlichhen;
            $ctlichhen->tclh_ma = $tc;
            $ctlichhen->lh_ma = $idlichhen;
            $ctlichhen->save();
        }

        $request->session()->put('thongbao', 'Đăng ký thành công');

        return redirect('/clinic/profile_patient');
    }


    public function thongtinbn()
    {
        $this->AuthLoginBN();
        $dskhunggio = khunggio::all();
        $dstrieuchung = trieuchunglichhen::all();
        $dsnghenghiep = nghenghiep::all();
        $dsthanhpho = thanhpho::all();
        $bn_ma = session()->get('bn_ma');
        $bnhan = DB::table('benhnhan')->join('bhyt', 'bhyt.bn_ma', '=', 'benhnhan.bn_ma')->where('benhnhan.bn_ma', $bn_ma)->first();
        if ($bnhan) {
            $benhnhan = DB::table('benhnhan')
                ->join('nghenghiep', 'nghenghiep.nn_ma', '=', 'benhnhan.nn_ma')
                ->join('dantoc', 'dantoc.dtoc_ma', '=', 'benhnhan.dtoc_ma')
                ->join('quoctich', 'quoctich.qt_ma', '=', 'benhnhan.qt_ma')
                ->join('xa', 'xa.x_ma', '=', 'benhnhan.x_ma')
                ->join('huyen', 'huyen.h_ma', '=', 'xa.h_ma')
                ->join('thanhpho', 'thanhpho.tp_ma', '=', 'huyen.tp_ma')
                ->join('bhyt', 'bhyt.bn_ma', '=', 'benhnhan.bn_ma')
                ->join('doituong', 'doituong.dt_ma', '=', 'bhyt.dt_ma')
                ->join('quyenloi', 'quyenloi.ql_ma', '=', 'bhyt.ql_ma')
                ->join('noicap', 'noicap.nc_ma', '=', 'bhyt.nc_ma')
                ->where('benhnhan.bn_ma', $bn_ma)->first();
        } else {
            $benhnhan = DB::table('benhnhan')
                ->join('nghenghiep', 'nghenghiep.nn_ma', '=', 'benhnhan.nn_ma')
                ->join('dantoc', 'dantoc.dtoc_ma', '=', 'benhnhan.dtoc_ma')
                ->join('quoctich', 'quoctich.qt_ma', '=', 'benhnhan.qt_ma')
                ->join('xa', 'xa.x_ma', '=', 'benhnhan.x_ma')
                ->join('huyen', 'huyen.h_ma', '=', 'xa.h_ma')
                ->join('thanhpho', 'thanhpho.tp_ma', '=', 'huyen.tp_ma')
                ->where('benhnhan.bn_ma', $bn_ma)->first();
        }
        $lichsukham = DB::table('benhnhan')
            ->join('phieukhambenh', 'phieukhambenh.bn_ma', '=', 'benhnhan.bn_ma')
            ->where('benhnhan.bn_ma', $bn_ma)
            ->where('phieukhambenh.ttk_ma', 3)
            ->select('*', 'phieukhambenh.created_at as ngaylap')
            ->get();
        $donthuoccu = DB::table('benhnhan')
            ->join('phieukhambenh', 'phieukhambenh.bn_ma', '=', 'benhnhan.bn_ma')
            ->join('donthuoc', 'donthuoc.pkb_ma', '=', 'phieukhambenh.pkb_ma')
            ->join('chitietdonthuoc', 'chitietdonthuoc.dthuoc_ma', '=', 'donthuoc.dthuoc_ma')
            ->join('thuoc', 'thuoc.t_ma', '=', 'chitietdonthuoc.t_ma')
            ->where('benhnhan.bn_ma', $bn_ma)
            ->where('phieukhambenh.ttk_ma', 3)
            ->get();
        $trieuchungcu = DB::table('benhnhan')
            ->join('phieukhambenh', 'phieukhambenh.bn_ma', '=', 'benhnhan.bn_ma')
            ->join('donthuoc', 'donthuoc.pkb_ma', '=', 'phieukhambenh.pkb_ma')
            ->join('trieuchung', 'trieuchung.dthuoc_ma', '=', 'donthuoc.dthuoc_ma')
            ->join('chitiettrieuchung', 'chitiettrieuchung.tcb_ma', '=', 'trieuchung.tcb_ma')
            ->join('benh', 'benh.b_ma', '=', 'chitiettrieuchung.b_ma')
            ->where('benhnhan.bn_ma', $bn_ma)
            ->where('phieukhambenh.ttk_ma', 3)
            ->get();
        $chandoancu = DB::table('benhnhan')
            ->join('phieukhambenh', 'phieukhambenh.bn_ma', '=', 'benhnhan.bn_ma')
            ->join('donthuoc', 'donthuoc.pkb_ma', '=', 'phieukhambenh.pkb_ma')
            ->join('chandoan', 'chandoan.dthuoc_ma', '=', 'donthuoc.dthuoc_ma')
            ->join('benh', 'benh.b_ma', '=', 'chandoan.b_ma')
            ->where('benhnhan.bn_ma', $bn_ma)
            ->where('phieukhambenh.ttk_ma', 3)
            ->get();
        $benhphu = DB::table('benhnhan')
            ->join('phieukhambenh', 'phieukhambenh.bn_ma', '=', 'benhnhan.bn_ma')
            ->join('donthuoc', 'donthuoc.pkb_ma', '=', 'phieukhambenh.pkb_ma')
            ->join('benhphu', 'benhphu.dthuoc_ma', '=', 'donthuoc.dthuoc_ma')
            ->join('benh', 'benh.b_ma', '=', 'benhphu.b_ma')
            ->where('benhnhan.bn_ma', $bn_ma)
            ->where('phieukhambenh.ttk_ma', 3)
            ->get();
        $chisocu = DB::table('chiso')
            ->join('chitietchiso', 'chitietchiso.cs_ma', '=', 'chiso.cs_ma')
            ->join('phieukhambenh', 'phieukhambenh.pkb_ma', '=', 'chitietchiso.pkb_ma')
            ->where('phieukhambenh.bn_ma', $bn_ma)
            ->where('phieukhambenh.ttk_ma', 3)
            ->get();
        $loidan = DB::table('benhnhan')
            ->join('phieukhambenh', 'phieukhambenh.bn_ma', '=', 'benhnhan.bn_ma')
            ->join('donthuoc', 'donthuoc.pkb_ma', '=', 'phieukhambenh.pkb_ma')
            ->where('benhnhan.bn_ma', $bn_ma)
            ->where('phieukhambenh.ttk_ma', 3)
            ->get();
        $loaihinhkhamcu = DB::table('loaihinhkham')
            ->join('phieukhambenh', 'phieukhambenh.lhk_ma', '=', 'loaihinhkham.lhk_ma')
            ->get();

            $lslichhen=DB::table('lichhen')
            ->join('benhnhan','benhnhan.bn_ma','lichhen.bn_ma')
            ->join('trangthailichhen','trangthailichhen.ttlh_ma','lichhen.ttlh_ma')
            ->join('khunggio', 'khunggio.kg_ma', '=', 'lichhen.kg_ma')
            ->join('buoi', 'khunggio.buoi_ma', '=', 'buoi.buoi_ma')
            ->where('lichhen.bn_ma','=',$bn_ma)
            ->select('*','lichhen.created_at as ngaydat')
            ->get();
            $lstclichhen = DB::table('chitietlichhen')
            ->join('trieuchunglichhen', 'trieuchunglichhen.tclh_ma', '=', 'chitietlichhen.tclh_ma')
            ->select('trieuchunglichhen.*', 'chitietlichhen.*')
            ->get();



        return view('website.ws_patient', compact('benhphu','lslichhen','lstclichhen','loaihinhkhamcu', 'loidan', 'lichsukham', 'donthuoccu', 'trieuchungcu', 'chandoancu', 'chisocu', 'benhnhan', 'dskhunggio', 'dstrieuchung', 'dsnghenghiep', 'dsthanhpho', 'bnhan'));
    }
    public function logoutbn()
    {
        $this->AuthLoginBN();
        session()->put('bn_ma', null);
        return redirect('/clinic/medical_register');
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
    public function lichsukham(Request $request)
    {
        $bn_ma = $request->bn_ma;
        $ngaybd = $request->ngaybd;
        $ngaykt = $request->ngaykt;
        $lichsukham = DB::table('benhnhan')
            ->join('phieukhambenh', 'phieukhambenh.bn_ma', '=', 'benhnhan.bn_ma')
            ->where('benhnhan.bn_ma', $bn_ma)
            ->where('phieukhambenh.ttk_ma', 3)
            ->whereBetween('phieukhambenh.created_at', [$ngaybd, $ngaykt])
            ->select('*', 'phieukhambenh.created_at as ngaylap')
            ->get();
        $donthuoccu = DB::table('benhnhan')
            ->join('phieukhambenh', 'phieukhambenh.bn_ma', '=', 'benhnhan.bn_ma')
            ->join('donthuoc', 'donthuoc.pkb_ma', '=', 'phieukhambenh.pkb_ma')
            ->join('chitietdonthuoc', 'chitietdonthuoc.dthuoc_ma', '=', 'donthuoc.dthuoc_ma')
            ->join('thuoc', 'thuoc.t_ma', '=', 'chitietdonthuoc.t_ma')
            ->where('benhnhan.bn_ma', $bn_ma)
            ->where('phieukhambenh.ttk_ma', 3)
            ->whereBetween('phieukhambenh.created_at', [$ngaybd, $ngaykt])
            ->get();
        $trieuchungcu = DB::table('benhnhan')
            ->join('phieukhambenh', 'phieukhambenh.bn_ma', '=', 'benhnhan.bn_ma')
            ->join('donthuoc', 'donthuoc.pkb_ma', '=', 'phieukhambenh.pkb_ma')
            ->join('trieuchung', 'trieuchung.dthuoc_ma', '=', 'donthuoc.dthuoc_ma')
            ->join('chitiettrieuchung', 'chitiettrieuchung.tcb_ma', '=', 'trieuchung.tcb_ma')
            ->join('benh', 'benh.b_ma', '=', 'chitiettrieuchung.b_ma')
            ->where('benhnhan.bn_ma', $bn_ma)
            ->where('phieukhambenh.ttk_ma', 3)
            ->whereBetween('phieukhambenh.created_at', [$ngaybd, $ngaykt])
            ->get();
        $chandoancu = DB::table('benhnhan')
            ->join('phieukhambenh', 'phieukhambenh.bn_ma', '=', 'benhnhan.bn_ma')
            ->join('donthuoc', 'donthuoc.pkb_ma', '=', 'phieukhambenh.pkb_ma')
            ->join('chandoan', 'chandoan.dthuoc_ma', '=', 'donthuoc.dthuoc_ma')
            ->join('benh', 'benh.b_ma', '=', 'chandoan.b_ma')
            ->where('benhnhan.bn_ma', $bn_ma)
            ->where('phieukhambenh.ttk_ma', 3)
            ->whereBetween('phieukhambenh.created_at', [$ngaybd, $ngaykt])
            ->get();
        $chisocu = DB::table('chiso')
            ->join('chitietchiso', 'chitietchiso.cs_ma', '=', 'chiso.cs_ma')
            ->join('phieukhambenh', 'phieukhambenh.pkb_ma', '=', 'chitietchiso.pkb_ma')
            ->where('phieukhambenh.bn_ma', $bn_ma)
            ->where('phieukhambenh.ttk_ma', 3)
            ->whereBetween('phieukhambenh.created_at', [$ngaybd, $ngaykt])
            ->get();
        $loidan = DB::table('benhnhan')
            ->join('phieukhambenh', 'phieukhambenh.bn_ma', '=', 'benhnhan.bn_ma')
            ->join('donthuoc', 'donthuoc.pkb_ma', '=', 'phieukhambenh.pkb_ma')
            ->where('benhnhan.bn_ma', $bn_ma)
            ->where('phieukhambenh.ttk_ma', 3)
            ->whereBetween('phieukhambenh.created_at', [$ngaybd, $ngaykt])
            ->get();
        $loaihinhkhamcu = DB::table('loaihinhkham')
            ->join('phieukhambenh', 'phieukhambenh.lhk_ma', '=', 'loaihinhkham.lhk_ma')
            ->whereBetween('phieukhambenh.created_at', [$ngaybd, $ngaykt])
            ->get();

        $lan = 1;
        $output = ' <div class="col-md-12">';
        foreach ($lichsukham as $lskham) :
            $output .= ' <div class="row">
                <div class="col-md-7">
                    <div class="row">
                        <div class="col-md-12" style="background-color:#ade8f4">
                            <h4><b>Lần  ' . $lan++ . ' - PKB' . sprintf('%05d', $lskham->pkb_ma) . ': ' . date('d/m/Y H:i:s', strtotime($lskham->ngaylap)) . '</b></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><span>Loại hình khám:</span>
                        </div>
                        <div class="col-md-8">';
            foreach ($loaihinhkhamcu as $lhk) :
                if ($lhk->pkb_ma == $lskham->pkb_ma) {
                    $output .= $lhk->lhk_ten;
                }

            endforeach;
            $output .= '</div>
                </div>
                    <div class="row">
                        <div class="col-md-4">
                            <span>Triệu chứng bệnh:</span>
                        </div>
                        <div class="col-md-8">';
            foreach ($trieuchungcu as $tccu) :
                if ($tccu->pkb_ma == $lskham->pkb_ma) {
                    $output .= $tccu->b_ten . ', ';
                }
            endforeach;
            $output .= '</div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><span>Chẩn đoán bệnh:</span>
                        </div>
                        <div class="col-md-8">';
            foreach ($chandoancu as $cdcu) :
                if ($cdcu->pkb_ma == $lskham->pkb_ma) {
                    $output .= $cdcu->b_ten . ', ';
                }
            endforeach;
            $output .= '</div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><span>Lời dặn:</span>
                        </div>
                        <div class="col-md-8">';
                            foreach ($loidan as $ld){
                            if ($ld->pkb_ma == $lskham->pkb_ma){
                                $output.=$ld->dthuoc_loidan;
                            }}
                            $output.=' </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><span>Lịch hẹn:</span>
                        </div>
                        <div class="col-md-8">';
                                foreach ($loidan as $lh){
                                if ($lh->pkb_ma == $lskham->pkb_ma){
                                    $output.=$lh->dthuoc_loihen;
                               }}
                $output.='</div>
                    </div>
                </div>
                <div class="col-md-5">
                    <br>
                    <span style="font-size: 20px;color:#005f73;font-weight:bold;">Chỉ số sức khỏe</span>
                    <div class="row">';
                        foreach ($chisocu as $cscu){
                        if ($cscu->pkb_ma == $lskham->pkb_ma){
                            $output.='<div class="col-md-4">
                            <label>'. $cscu->cs_ten .':</label>
                        </div>
                        <div class="col-md-2">'. $cscu->ctcs_chitiet .'</div>';
                          }}
                        
                          $output.='</div>
                  

                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <table class="w-100 ml-1 mr-1 table">
                        <tr>
                            <th class="text-center">STT</th>
                            <th class="text-center">Tên Thuốc</th>
                            <th class="text-center">Cách dùng</th>
                            <th class="text-center">Số lượng</th>
                        </tr>';
                         $i = 1;
                        foreach ($donthuoccu as $toacu):
                            if ($toacu->pkb_ma == $lskham->pkb_ma){
                                $output.='<tr>
                                    <td class="text-center">'.$i++ .'</td>
                                    <td>'. $toacu->t_ten.'</td>
                                    <td>'. $toacu->ctdt_lieudung .'</td>
                                    <td class="text-center">'. $toacu->ctdt_soluong .'</td>
                                </tr>';
                             }
                        endforeach;
                        $output.=' </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <hr style="background-color:red;">
                </div>
            </div>';
        endforeach;
        $output .= '</div>';
        return response()->json([
            'output' =>    $output,
            // 'output' =>    $bn_ma
        ]);
    }
}
