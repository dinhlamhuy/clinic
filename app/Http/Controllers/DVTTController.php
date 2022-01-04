<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\donvitinhthuoc;

use Illuminate\Support\Facades\DB;

session_start();

class DVTTController extends Controller
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
        $dsdonvitinhthuoc = donvitinhthuoc::all();
        return view('admin.ad_drug_unit',compact('dsdonvitinhthuoc'));
    }

    public function add_drug_unit(Request $request)
    {

        $result = DB::table('donvitinhthuoc')->where('dvtt_ten', $request->dvtt_ten)->first();
        if ($result) {
            $request->session()->put('thongbao', 'Đã tồn tại');
        } else {
            $nghe = new donvitinhthuoc;
            $nghe->dvtt_ten = $request->dvtt_ten;
            $nghe->save();

            $request->session()->put('thongbao', 'Thêm mới thành công');
        }
        return redirect('/admin/drug_unit');
    }

    public function edit_drug_unit(Request $request)
    {
        $result = DB::table('donvitinhthuoc')->where('dvtt_ma', $request->dvtt_ma)->where('dvtt_ten', $request->dvtt_ten)->first();
        if ($result) {
        }else {
            
            $kttrungten = DB::table('donvitinhthuoc')->where('dvtt_ma', '<>', $request->dvtt_ma)->where('dvtt_ten', $request->dvtt_ten)->first();
            if ($kttrungten) {
                $request->session()->put('thongbao', 'Đã tồn tại');

            } else {
                $nghe = new donvitinhthuoc;
                $nghe = donvitinhthuoc::find($request->dvtt_ma);
                $nghe->dvtt_ten  =  $request->dvtt_ten;
                $nghe->save();
                $request->session()->put('thongbao', 'Cập nhật thành công');
            }
        }
        return redirect('/admin/drug_unit');
    }

    public function delete_drug_unit(Request $request){
        $nghe = donvitinhthuoc::find($request->dvtt_ma);
        $nghe->delete();
        
        $request->session()->put('thongbao', 'Xóa thành công');
        return redirect('/admin/drug_unit');
    }


}
