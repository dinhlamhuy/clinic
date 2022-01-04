<?php

namespace App\Http\Controllers;

use Cron\MonthField;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


session_start();
class AdminController extends Controller
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
        $tongbenhnhan=DB::table('benhnhan')->count();
        // ->join('phieukhambenh','phieukhambenh.bn_ma','=','benhnhan.bn_ma')
        $tongbenhnhantheongay=DB::table('benhnhan')
        ->join('phieukhambenh','phieukhambenh.bn_ma','=','benhnhan.bn_ma')
        ->whereDate('phieukhambenh.created_at',date('Y-m-d'))->count();

        $tonggiacls=DB::table('chitietchidinh')->sum('chitietchidinh.ctcd_giatien');
        $tongpkb=DB::table('phieukhambenh')
        ->join('loaihinhkham','loaihinhkham.lhk_ma','=', 'phieukhambenh.lhk_ma')
        ->sum(DB::raw('lhk_giatien + lhk_giachenhlech'));
        $dsbenhthuonggap=DB::table('benh')
        ->join('chandoan','chandoan.b_ma','=','benh.b_ma')
        ->select('b_ten', DB::raw('count(chandoan.b_ma) as total_benh'))
                ->groupBy('b_ten')
                ->get();
        $dsbnhandakham=DB::table('phieukhambenh')
        ->where('phieukhambenh.ttk_ma','=','3')
        ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(pkb_ma) as total_pkb'))
                ->groupBy('date')
                ->get();
        $dslonhapthuoc=DB::table('chitietlonhap')
        ->select('lnt_ma', DB::raw('sum(ctlnt_gianhap*ctlnt_slchua) as total_lonhap'))
                ->groupBy('lnt_ma')
                ->get();
        $lonhap=DB::table('lonhapthuoc')->get();
        $dsloaihinhkham=DB::table('phieukhambenh')
        // ->join('loaihinhkham','loaihinhkham.lhk_ma','=', 'phieukhambenh.lhk_ma')
        ->select('lhk_ma', DB::raw('count(pkb_ma) as loaihinhkham'))
                ->groupBy('lhk_ma')
                ->get();

                $dslonhap = DB::table('thuoc')
        ->join('chitietlonhap','chitietlonhap.t_ma','=','thuoc.t_ma')
        ->join('lonhapthuoc','lonhapthuoc.lnt_ma','=','chitietlonhap.lnt_ma')
        ->join('phanloai','phanloai.pl_ma','=','thuoc.pl_ma')
        ->join('nhomthuoc','nhomthuoc.nt_ma','=','thuoc.nt_ma')
        ->join('thuocgoc','thuocgoc.tg_ma','=','thuoc.tg_ma')
        ->join('donvitinhthuoc','donvitinhthuoc.dvtt_ma','=','chitietlonhap.dvtt_ma')
        ->select('*', 'lonhapthuoc.created_at as ngaynhap')
        ->get();

        $slbenhnhan=DB::table('benhnhan')
        ->whereDate('created_at','=',date('Y-m-d'))
        ->count();
        $sllichhen=DB::table('lichhen')
        ->whereDate('created_at','=',date('Y-m-d'))
        ->count();
        $slpkb=DB::table('phieukhambenh')
        ->whereDate('created_at','=',date('Y-m-d'))
        ->count();


        $sluongpkb=DB::table('phieukhambenh')
        ->whereMonth('created_at','=',date('m', strtotime(date('Y-m-d'))))
        ->count();
        $slh=DB::table('lichhen')
        ->whereMonth('created_at','=',date('m', strtotime(date('Y-m-d'))))
        ->count();
        $sllhk_bhyt=DB::table('phieukhambenh')
        ->join('loaihinhkham','loaihinhkham.lhk_ma','=', 'phieukhambenh.lhk_ma')
        ->where('loaihinhkham.lhk_ma','=','1')
        ->whereMonth('phieukhambenh.created_at','=',date('m', strtotime(date('Y-m-d'))))
        ->count();

        $sllhk_dv=DB::table('phieukhambenh')
        ->join('loaihinhkham','loaihinhkham.lhk_ma','=', 'phieukhambenh.lhk_ma')
        ->where('loaihinhkham.lhk_ma','=','2')
        ->whereMonth('phieukhambenh.created_at','=',date('m', strtotime(date('Y-m-d'))))
        ->count();
        $tonggcls=DB::table('chitietchidinh')
        ->whereMonth('chitietchidinh.created_at','=',date('m', strtotime(date('Y-m-d'))))
        ->sum('chitietchidinh.ctcd_giatien');
        $tonggkhambenh=DB::table('phieukhambenh')
        ->join('loaihinhkham','loaihinhkham.lhk_ma','=', 'phieukhambenh.lhk_ma')
        ->whereMonth('phieukhambenh.created_at','=',date('m', strtotime(date('Y-m-d'))))
        ->sum(DB::raw('lhk_giatien + lhk_giachenhlech'));

        $dsbthuonggap=DB::table('benh')
        ->join('chandoan','chandoan.b_ma','=','benh.b_ma')
        ->whereMonth('chandoan.created_at','=',date('m', strtotime(date('Y-m-d'))))
        ->select('b_ten', DB::raw('count(chandoan.b_ma) as total_benh'))
                ->groupBy('b_ten')->orderBy('total_benh', 'DESC')->take(4)
                ->get();


        $tongbthuonggap=DB::table('benh')
        ->join('chandoan','chandoan.b_ma','=','benh.b_ma')
        ->whereMonth('chandoan.created_at','=',date('m', strtotime(date('Y-m-d'))))
        ->select('b_ten', DB::raw('count(chandoan.b_ma) as total_benh'))
                ->groupBy('b_ten')->orderBy('total_benh', 'DESC')
        ->get();

        return view('admin.ad_dashboard', compact('slh','dsbthuonggap','tongbthuonggap','sluongpkb','tonggcls','tonggkhambenh','sllhk_bhyt','sllhk_dv','slpkb','sllichhen','slbenhnhan','lonhap','tongbenhnhan','tonggiacls','tongpkb' ,'dsbenhthuonggap','dsbnhandakham','tongbenhnhantheongay','dsloaihinhkham','dslonhap','dslonhapthuoc'));
    }

    public function login()
    {
      
        return view('admin.ad_login');
    }
    public function admin_login(Request $request)
    {
        $acc = $request->account;
        $pass = md5($request->password);
        $result = DB::table('admin')->where('ad_tentaikhoan', $request->account)->where('ad_matkhau', $pass)->first();
        if ($result) {
            
            $request->session()->put('ad_ma',$result->ad_ma);
            $request->session()->put('ad_ten',$result->ad_ten);
            $request->session()->put('ad_tentaikhoan',$result->ad_tentaikhoan);
            return redirect('/admin/index');
        } else {
            $request->session()->put('mess','Kiểm tra đăng nhập lại bạn nhé');
            return redirect('/admin/login');
        }
        // echo session('ad_ten');
    }
    public function admin_logout(Request $request)
    {
        $this->AuthLogin();

        $request->session()->put('ad_ma', null);
        $request->session()->put('ad_ten', null);
        $request->session()->put('ad_tentaikhoan', null);
        return redirect('/admin/login');
    }

    public function thongke(Request $request){
        $ngaybd=date('Y-m-d',strtotime($request->ngaybd));
        $ngaykt=date('Y-m-d',strtotime($request->ngaykt));

        $sluongpkb=DB::table('phieukhambenh')
        // ->whereMonth('created_at','=',date('m', strtotime(date('Y-m-d'))))
        ->whereBetween('created_at', [$ngaybd, $ngaykt])
        ->count();

        $slh=DB::table('lichhen')
        // ->whereMonth('created_at','=',date('m', strtotime(date('Y-m-d'))))
        ->whereBetween('created_at', [$ngaybd, $ngaykt])
        ->count();

        $sllhk_bhyt=DB::table('phieukhambenh')
        ->join('loaihinhkham','loaihinhkham.lhk_ma','=', 'phieukhambenh.lhk_ma')
        ->where('loaihinhkham.lhk_ma','=','1')
        // ->whereMonth('phieukhambenh.created_at','=',date('m', strtotime(date('Y-m-d'))))
        ->whereBetween('phieukhambenh.created_at', [$ngaybd, $ngaykt])
        ->count();

        $sllhk_dv=DB::table('phieukhambenh')
        ->join('loaihinhkham','loaihinhkham.lhk_ma','=', 'phieukhambenh.lhk_ma')
        ->where('loaihinhkham.lhk_ma','=','2')
        // ->whereMonth('phieukhambenh.created_at','=',date('m', strtotime(date('Y-m-d'))))
        ->whereBetween('phieukhambenh.created_at', [$ngaybd, $ngaykt])
        ->count();

        $tonggcls=DB::table('chitietchidinh')
        // ->whereMonth('chitietchidinh.created_at','=',date('m', strtotime(date('Y-m-d'))))
        ->whereBetween('created_at', [$ngaybd, $ngaykt])
        ->sum('chitietchidinh.ctcd_giatien');

        $tonggkhambenh=DB::table('phieukhambenh')
        ->join('loaihinhkham','loaihinhkham.lhk_ma','=', 'phieukhambenh.lhk_ma')
        // ->whereMonth('phieukhambenh.created_at','=',date('m', strtotime(date('Y-m-d'))))
        ->whereBetween('phieukhambenh.created_at', [$ngaybd, $ngaykt])
        ->sum(DB::raw('lhk_giatien + lhk_giachenhlech'));

        $dsbtgap=DB::table('benh')
        ->join('chandoan','chandoan.b_ma','=','benh.b_ma')
        // ->whereMonth('chandoan.created_at','=',date('m', strtotime(date('Y-m-d'))))
        // ->whereBetween('chandoan.created_at', [$ngaybd, $ngaykt])
        ->whereDate('chandoan.created_at','>=',$ngaybd)
        ->whereDate('chandoan.created_at','<=',$ngaykt)
        ->select('b_ten', DB::raw('count(chandoan.b_ma) as total_benh'))
                ->groupBy('b_ten')->orderBy('total_benh', 'DESC')->take(4)
                ->get();

        $tongbthuonggap=DB::table('benh')
        ->join('chandoan','chandoan.b_ma','=','benh.b_ma')
        // ->whereMonth('chandoan.created_at','=',date('m', strtotime(date('Y-m-d'))))
        // ->whereBetween('chandoan.created_at', [$ngaybd, $ngaykt])
        ->whereDate('chandoan.created_at','>=',$ngaybd)
        ->whereDate('chandoan.created_at','<=',$ngaykt)
        ->select('b_ten', DB::raw('count(chandoan.b_ma) as total_benh'))
                ->groupBy('b_ten')->orderBy('total_benh', 'DESC')
        ->get();
        $pkb=0; 
        if($sluongpkb>0){ $pkb=$sluongpkb;}

        $dv=0; if($sllhk_dv>0){ $dv=round((($sllhk_dv)/($sllhk_dv+$sllhk_bhyt))*100,2); }
        $bhyte=0; if($sllhk_bhyt>0){ $bhyte=round((($sllhk_bhyt)/($sllhk_dv+$sllhk_bhyt))*100,2); } 
        $lh=0; if($slh>0){ $lh=$slh; }
        $gkhambenh=0; if($tonggkhambenh>0){ $gkhambenh=$tonggkhambenh; } 
        $giacls=0; if($tonggcls>0){ $giacls=$tonggcls; }
        $tongbenh=0;  $tongsobenh=0;
        foreach($tongbthuonggap as $tongb):
            $tongsobenh=$tongsobenh+$tongb->total_benh;
        endforeach;
        $output='';
        
        $output='<div class="col-md-6">
        <center><h5>Kết quả</h5></center>
        <table class="mt-1 table table-bordered" width="100%;">
            <tr height="50px;">
                <td class="pl-2"><i class="fa fa-angle-double-right" aria-hidden="true">&ensp;</i>Tổng số lượng lượt khám:</td>
                <td class="text-center"> <span style="color: red;">'.$pkb.'</span></td>
            </tr>
            <tr height="50px;">
                <td class="pl-2"><i class="fa fa-angle-double-right" aria-hidden="true">&ensp;</i>Loại hình khám bệnh:</td>
                <td class="text-center"> 
                    <span >DV</span>: <span style="color: red;">'.$dv.'  %</span> <br>
                    <span>BHYT</span>: <span style="color: red;">'.$bhyte.'%</span>
                </td>
            </tr>
            <tr height="50px;">
                <td class="pl-2"><i class="fa fa-angle-double-right" aria-hidden="true">&ensp;</i>Tổng số lượng lịch hẹn:</td>
                <td class="text-center"> <span style="color: red;">'.$lh.'</span></td>
            </tr>
            <tr height="50px;">
                <td class="pl-2"><i class="fa fa-angle-double-right" aria-hidden="true">&ensp;</i>Tổng doanh thu khám:</td>
                <td class="text-center"> <span style="color: red;">'.$gkhambenh.' (VND)</span></td>
            </tr>
            <tr height="50px;">
                <td class="pl-2"><i class="fa fa-angle-double-right" aria-hidden="true">&ensp;</i>Tổng doanh thu CLS:</td>
                <td class="text-center"> <span style="color: red;">'.$giacls.' (VND)</span></td>
            </tr>
        </table>
    </div>
    <div class="col-md-6">
        <center><h5>Các bệnh thường gặp</h5></center>
        <table class="mt-1 table table-bordered" width="100%">';
            
            foreach($dsbtgap as $btg){
            $tongbenh=$tongbenh+$btg->total_benh; 
            $output.='<tr height="50px;">
                <td class="pl-2"><i class="fa fa-angle-double-right" aria-hidden="true">&ensp;</i>'. $btg->b_ten.'</td>
                <td class="text-center"> <span style="color: red;">'. round(($btg->total_benh/$tongsobenh)*100,2) .'%</span></td>
            </tr>';
        }
        if($tongsobenh>0){
           $output.= '<tr height="50px;">
                <td class="pl-2"> <button type="button" class="btn " data-toggle="modal" data-target="#showbenhkhac"><i class="fa fa-angle-double-right" aria-hidden="true">&ensp;</i>Khác</button></td>
                <td class="text-center"> <span style="color: red;">'. round((($tongsobenh-$tongbenh)/$tongsobenh)*100,2).'%</span></td>
                    </tr>
                </table>
            </div>';

            $output.='<div class="modal fade" id="showbenhkhac" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Các bệnh thường gặp khác</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body"> <button id="btninbtg2" style="float:right;" class="btn btn-success"><i class="fa fa-file-excel-o" aria-hidden="true"></i></button>
                  <table id="thongkebtg"  class="table table-bordered w-100 ">
                  <tr>
                      <th style="width:20%;">STT</th>
                      <th style="width:50%;">Tên bệnh</th>
                      <th style="width:30%;">Tỷ lệ (%)</th> 
                  </tr>';
                  $i=1;
                  foreach($tongbthuonggap as $tongb):
                   $output.='<tr>
                   <th>'.$i++.'</th>
                   <td>'.$tongb->b_ten.'</td>
                   <td> <span style="color: red;">'. round(($btg->total_benh/$tongsobenh)*100,2) .' %</span></td>
                   </tr>' ;
                  
                endforeach;
                  $output.='</table>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
              </div>
            </div>';
        }
        

        return response()->json([
            'output' =>    $output,
            // 'ngaykt' =>    $sllichhen
        ]);
    }
}
