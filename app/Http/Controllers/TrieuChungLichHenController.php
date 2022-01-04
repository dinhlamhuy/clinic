<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\trieuchunglichhen;

class TrieuChungLichHenController extends Controller
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
        $dstrieuchunglichhen=DB::table('trieuchunglichhen')->get();
        return view('admin.ad_symptom', compact('dstrieuchunglichhen'));
    }
    public function add_symptom(Request $request)
    {

        $result = DB::table('trieuchunglichhen')->where('tclh_ten', $request->tentrieuchung)->first();
        if ($result) {
            $request->session()->put('thongbao', 'Đã tồn tại');
        } else {
            $cvu = new trieuchunglichhen;
            $cvu->tclh_ten = $request->tentrieuchung;
            $cvu->save();

            $request->session()->put('thongbao', 'Thêm mới thành công');
        }
        return redirect('/admin/symptom');
    }

    public function edit_symptom(Request $request)
    {
        $result = DB::table('trieuchunglichhen')->where('tclh_ma', $request->tclh_ma)->where('tclh_ten', $request->tclh_ten)->first();
        if ($result) {
        }else {
            
            $kttrungten = DB::table('trieuchunglichhen')->where('tclh_ma', '<>', $request->tclh_ma)->where('tclh_ten', $request->tclh_ten)->first();
            if ($kttrungten) {
                $request->session()->put('thongbao', 'Đã tồn tại');

            } else {
                $tclh = new trieuchunglichhen;
                $tclh = trieuchunglichhen::find($request->tclh_ma);
                $tclh->tclh_ten  =  $request->tclh_ten;
                $tclh->save();
                $request->session()->put('thongbao', 'Cập nhật thành công');
            }
        }
        return redirect('/admin/symptom');
    }
    public function delete_symptom(Request $request){
        $tclh = trieuchunglichhen::find($request->tclh_ma);
        $tclh->delete();
        
        $request->session()->put('thongbao', 'Xóa thành công');
        return redirect('/admin/symptom');
    }
}
