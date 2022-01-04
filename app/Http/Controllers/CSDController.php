<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cachsudung;

use Illuminate\Support\Facades\DB;

session_start();

class CSDController extends Controller
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
        $dscachsudung = cachsudung::all();
        return view('admin.ad_using',compact('dscachsudung'));
    }

    public function add_using(Request $request)
    {

        $result = DB::table('cachsudung')->where('csd_ten', $request->tencachsudung)->first();
        if ($result) {
            $request->session()->put('thongbao', 'Đã tồn tại');
        } else {
            $nghe = new cachsudung;
            $nghe->csd_ten = $request->csd_ten;
            $nghe->save();

            $request->session()->put('thongbao', 'Thêm mới thành công');
        }
        return redirect('/admin/using');
    }

    public function edit_using(Request $request)
    {
        $result = DB::table('cachsudung')->where('csd_ma', $request->csd_ma)->where('csd_ten', $request->csd_ten)->first();
        if ($result) {
        }else {
            
            $kttrungten = DB::table('cachsudung')->where('csd_ma', '<>', $request->csd_ma)->where('csd_ten', $request->csd_ten)->first();
            if ($kttrungten) {
                $request->session()->put('thongbao', 'Đã tồn tại');

            } else {
                $nghe = new cachsudung;
                $nghe = cachsudung::find($request->csd_ma);
                $nghe->csd_ten  =  $request->csd_ten;
                $nghe->save();
                $request->session()->put('thongbao', 'Cập nhật thành công');
            }
        }
        return redirect('/admin/using');
    }

    public function delete_using(Request $request){
        $nghe = cachsudung::find($request->csd_ma);
        $nghe->delete();
        
        $request->session()->put('thongbao', 'Xóa thành công');
        return redirect('/admin/using');
    }
}
