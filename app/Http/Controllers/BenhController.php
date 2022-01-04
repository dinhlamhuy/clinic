<?php

namespace App\Http\Controllers;

use App\Models\nhombenh;
use App\Models\benh;
use App\Models\chitiettrieuchung;
use App\Models\trieuchungbenh;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

session_start();

class BenhController extends Controller
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
        $dsnhombenh = nhombenh::all();
        $dsbenh = benh::all();
        $dstrieuchungbenh = trieuchungbenh::all();
        $dscttchung = chitiettrieuchung::all();
        $dschitietbn=DB::table('trieuchungbenh')
        ->join('chitiettrieuchung','chitiettrieuchung.tcb_ma','=','trieuchungbenh.tcb_ma')
        // ->select('b_ten', DB::raw('count(b_ma) as total'))
        // ->groupBy('b_ten')

        ->get();

        return view('admin.ad_diseases', compact('dsnhombenh','dsbenh','dschitietbn','dstrieuchungbenh','dscttchung'));
    }
    public function add_diseases(Request $request)
    {
        $result = DB::table('benh')->where('b_ten', $request->b_ten)->first();
        if ($result) {
            $request->session()->put('thongbao', 'Đã tồn tại');
        } else {
            $benh = new benh;
            $benh->b_ten = $request->b_ten;
            $benh->nb_ma = $request->nb_ma;

           
            $benh->save();
            $id_benh=$benh->b_ma;
            $tc_ma = [];
        foreach ($request->trieuchung as $tc) {

            $tc_ma[] = ['tcb_ma'  =>  $tc, 'b_ma'    =>  $id_benh];
        }
        $tchung = DB::table('chitiettrieuchung')->insert($tc_ma);

            $request->session()->put('thongbao', 'Thêm mới thành công');
        }
        return redirect('/admin/diseases');
    }
    public function edit_diseases(Request $request)
    {
        // $result = DB::table('benh')->where('b_ma', $request->b_ma)->where('b_ten', $request->b_ten)->where('nb_ma', $request->nb_ma)->first();
        // if ($result) {
        // }else {
            
            $kttrungten = DB::table('benh')->where('b_ma', '<>', $request->b_ma)->where('b_ten', $request->b_ten)->first();
            if ($kttrungten) {
                $request->session()->put('thongbao', 'Đã tồn tại');

            } else {
                $benh = new benh;
                $benh = benh::find($request->b_ma);
                $benh->nb_ma  =  $request->nb_ma;
                $benh->b_ten  =  $request->b_ten;
                // $benh->b_trieuchung  =  $request->b_trieuchung;
                
                $benh->save();

                $trieuchung = DB::table('chitiettrieuchung')
                ->where('b_ma', $request->b_ma)
                ->delete();
                $tc_ma = [];
                foreach ($request->trieuchung as $tc) {
        
                    $tc_ma[] = ['tcb_ma'  =>  $tc, 'b_ma'    =>  $request->b_ma];
                }
                $tchung = DB::table('chitiettrieuchung')->insert($tc_ma);
                $request->session()->put('thongbao', 'Cập nhật thành công');
            // }
        }
        
        return redirect('/admin/diseases');
    }
    public function delete_diseases(Request $request){
        $benh = benh::find($request->b_ma);
        $benh->delete();
        
        $request->session()->put('thongbao', 'Xóa thành công');
        return redirect('/admin/diseases');
    }
}
