<?php

namespace App\Http\Controllers;
use App\Models\thuoc;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ThuocController extends Controller
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
        $dsthuoc = DB::table('thuoc')
        ->join('nhomthuoc','nhomthuoc.nt_ma','=','thuoc.nt_ma')
        ->join('phanloai','phanloai.pl_ma','=','thuoc.pl_ma')
        ->join('thuocgoc','thuocgoc.tg_ma','=','thuoc.tg_ma')
        ->join('cachsudung','cachsudung.csd_ma','=','thuoc.csd_ma')
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
        $phanloai=DB::table('phanloai')->get();
        $nhomthuoc=DB::table('nhomthuoc')->get();
        $thuocgoc=DB::table('thuocgoc')->get();
        $cachsudung=DB::table('cachsudung')->get();
      
        $chitietlothuoc = DB::table('chitietlonhap')
                ->select('t_ma', DB::raw('SUM(ctlnt_soluong) as total'))
                ->groupBy('t_ma')
                ->get();
        return view('admin.ad_medicine', compact('dsthuoc','chitietlothuoc','dslonhap','phanloai','nhomthuoc','thuocgoc','cachsudung'));
    }
    public function dsthuoc()
    {
        $this->AuthLogin();
        $dsthuoc = DB::table('thuoc')
        ->join('nhomthuoc','nhomthuoc.nt_ma','=','thuoc.nt_ma')
        ->join('phanloai','phanloai.pl_ma','=','thuoc.pl_ma')
        ->join('thuocgoc','thuocgoc.tg_ma','=','thuoc.tg_ma')
        ->join('cachsudung','cachsudung.csd_ma','=','thuoc.csd_ma')
        ->get();
      
        $phanloai=DB::table('phanloai')->get();
        $nhomthuoc=DB::table('nhomthuoc')->get();
        $thuocgoc=DB::table('thuocgoc')->get();
        $cachsudung=DB::table('cachsudung')->get();
      
       
        return view('admin.ad_list_medicine', compact('dsthuoc','phanloai','nhomthuoc','thuocgoc','cachsudung'));
    }
    public function add_medicine(Request $request){
        $thuoc=new thuoc;
        $thuoc->t_ten=$request->t_ten;
        $thuoc->t_hamluong=$request->t_hamluong;
        $thuoc->t_lieudung=$request->t_lieudung;
        $thuoc->csd_ma=$request->csd_ma;
        $thuoc->nt_ma=$request->nt_ma;
        $thuoc->tg_ma=$request->tg_ma;
        $thuoc->pl_ma=$request->pl_ma;
        $thuoc->t_giabhyt=$request->t_giabhyt;
        $thuoc->t_giadv=$request->t_giadv;
        $thuoc->save();
        $request->session()->put('thongbao', 'Thêm thành công');

         return redirect('/admin/list_medicine');
    }
    public function edit_medicine(Request $request){
        $thuoc=thuoc::find($request->t_ma);
        $thuoc->t_ten=$request->t_ten;
        $thuoc->t_hamluong=$request->t_hamluong;
        $thuoc->t_lieudung=$request->t_lieudung;
        $thuoc->csd_ma=$request->csd_ma;
        $thuoc->nt_ma=$request->nt_ma;
        $thuoc->tg_ma=$request->tg_ma;
        $thuoc->pl_ma=$request->pl_ma;
        $thuoc->t_giabhyt=$request->t_giabhyt;
        $thuoc->t_giadv=$request->t_giadv;
        $thuoc->save();
        $request->session()->put('thongbao', 'Cập nhật thành công');

         return redirect('/admin/list_medicine');
    }
    public function delete_medicine(Request $request){
        $thuoc=DB::table('thuoc')->where('t_ma',$request->t_ma)->delete();
        $request->session()->put('thongbao', 'Xóa thành công');

        return redirect('/admin/list_medicine');

    }
}
