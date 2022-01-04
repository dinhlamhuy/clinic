<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NhomCLSController;
use App\Http\Controllers\CLSController;
use App\Http\Controllers\NhomThuocController;
use App\Http\Controllers\NhaCungCapController;
use App\Http\Controllers\NhomBenhController;
use App\Http\Controllers\BenhController;
use App\Http\Controllers\ThuocGocController;
use App\Http\Controllers\LoNhapController;
use App\Http\Controllers\ChiTietLoNhapController;
use App\Http\Controllers\DKKhamBenhController;
use App\Http\Controllers\KhamBenhController;
use App\Http\Controllers\PhieuChiDinhController;
use App\Http\Controllers\DSDatLichController;
use App\Http\Controllers\ThuNganController;
use App\Http\Controllers\ChucVuController;
use App\Http\Controllers\DangNhapNVController;
use App\Http\Controllers\PhatThuocController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ThuocController;
use App\Http\Controllers\PhongController;
use App\Http\Controllers\BenhNhanController;
use App\Http\Controllers\TrieuChungLichHenController;
use App\Http\Controllers\QuocTichController;
use App\Http\Controllers\DanTocController;
use App\Http\Controllers\NgheNghiepController;
use App\Http\Controllers\DiaChiController;
use App\Http\Controllers\CSDController;
use App\Http\Controllers\BHYTController;
use App\Http\Controllers\TrieuChungBenhController;
use App\Http\Controllers\DVTTController;
use App\Http\Controllers\QLLichHenController;


//--------------------------------------


// ADMIN
// Đăng nhập, Đăng xuất
Route::get('/admin/login', [AdminController::class, 'login'])->name('login');
Route::post('/admin/admin_login', [AdminController::class, 'admin_login'])->name('admin_login');
Route::get('/admin/logout', [AdminController::class, 'admin_logout'])->name('admin_logout');

Route::get('/admin/index', [AdminController::class, 'index'])->name('index');
Route::post('/admin/thongke', [AdminController::class, 'thongke'])->name('thongke');

//disease_symptoms Triệu chứng bệnh
Route::get('/admin/disease_symptoms', [TrieuChungBenhController::class, 'index'])->name('disease_symptoms');
Route::post('/admin/add_disease_symptoms', [TrieuChungBenhController::class, 'add_disease_symptoms']);
Route::post('/admin/edit_disease_symptoms', [TrieuChungBenhController::class, 'edit_disease_symptoms']);
Route::post('/admin/delete_disease_symptoms', [TrieuChungBenhController::class, 'delete_disease_symptoms']);

//group_subclinical nhóm cận lâm sàng
Route::get('/admin/group_subclinical', [NhomCLSController::class, 'index'])->name('group_subclinical');
Route::post('/admin/add_group_subclinical', [NhomCLSController::class, 'add_group_subclinical']);
Route::post('/admin/edit_group_subclinical', [NhomCLSController::class, 'edit_group_subclinical']);
Route::post('/admin/delete_group_subclinical', [NhomCLSController::class, 'delete_group_subclinical']);

//subclinical Cận lâm sàng
Route::get('/admin/subclinical', [CLSController::class, 'index'])->name('subclinical');
Route::post('/admin/add_subclinical', [CLSController::class, 'add_subclinical']);
Route::post('/admin/edit_subclinical', [CLSController::class, 'edit_subclinical']);
Route::post('/admin/delete_subclinical', [CLSController::class, 'delete_subclinical']);

//group_medicine nhóm thuốc
Route::get('/admin/group_medicine', [NhomThuocController::class, 'index'])->name('group_medicine');
Route::post('/admin/add_group_medicine', [NhomThuocController::class, 'add_group_medicine']);
Route::post('/admin/edit_group_medicine', [NhomThuocController::class, 'edit_group_medicine']);
Route::post('/admin/delete_group_medicine', [NhomThuocController::class, 'delete_group_medicine']);

//supplier nhà cung cấp
Route::get('/admin/supplier', [NhaCungCapController::class, 'index'])->name('supplier');
Route::post('/admin/add_supplier', [NhaCungCapController::class, 'add_supplier']);
Route::post('/admin/edit_supplier', [NhaCungCapController::class, 'edit_supplier']);
Route::post('/admin/delete_supplier', [NhaCungCapController::class, 'delete_supplier']);

//group_diseases nhóm bệnh
Route::get('/admin/group_diseases', [NhomBenhController::class, 'index'])->name('group_diseases');
Route::post('/admin/add_group_diseases', [NhomBenhController::class, 'add_group_diseases']);
Route::post('/admin/edit_group_diseases', [NhomBenhController::class, 'edit_group_diseases']);
Route::post('/admin/delete_group_diseases', [NhomBenhController::class, 'delete_group_diseases']);

//diseases Bệnh
Route::get('/admin/diseases', [BenhController::class, 'index'])->name('diseases');
Route::post('/admin/add_diseases', [BenhController::class, 'add_diseases']);
Route::post('/admin/edit_diseases', [BenhController::class, 'edit_diseases']);
Route::post('/admin/delete_diseases', [BenhController::class, 'delete_diseases']);

//generic_drug Thuốc gốc
Route::get('/admin/generic_drug', [ThuocGocController::class, 'index'])->name('generic_drug');
Route::post('/admin/add_generic_drug', [ThuocGocController::class, 'add_generic_drug']);
Route::post('/admin/edit_generic_drug', [ThuocGocController::class, 'edit_generic_drug']);
Route::post('/admin/delete_generic_drug', [ThuocGocController::class, 'delete_generic_drug']);

//import_medicine Lô nhập thuốc
Route::get('/admin/import_medicine', [LonhapController::class, 'index'])->name('import_medicine');
Route::post('/admin/add_import_medicine', [LonhapController::class, 'add_import_medicine']);
Route::post('/admin/edit_import_medicine', [LonhapController::class, 'edit_import_medicine']);
Route::post('/admin/delete_import_medicine', [LonhapController::class, 'delete_import_medicine']);

//details_import_medicine Chi tiết Lô nhập thuốc
Route::get('/admin/details_import_medicine/{id}', [ChiTietLoNhapController::class, 'index'])->name('details_import_medicine/{id}');
Route::post('/admin/add_details_import_medicine', [ChiTietLoNhapController::class, 'add_details_import_medicine']);
Route::post('/admin/edit_details_import_medicine', [ChiTietLoNhapController::class, 'edit_details_import_medicine']);
Route::post('/admin/delete_details_import_medicine', [ChiTietLoNhapController::class, 'delete_details_import_medicine']);

// Chức vụ
Route::get('/admin/position', [ChucVuController::class, 'index'])->name('position');
Route::post('/admin/add_position', [ChucVuController::class, 'add_position']);
Route::post('/admin/edit_position', [ChucVuController::class, 'edit_position']);
Route::post('/admin/delete_position', [ChucVuController::class, 'delete_position']);

Route::get('/admin/status_appchedule', [QLLichHenController::class, 'status_appchedule'])->name('status_appchedule');
Route::get('/admin/appointment_schedule', [QLLichHenController::class, 'appointment_schedule'])->name('appointment_schedule');
// Triệu chứng lịch hẹn
Route::get('/admin/symptom', [TrieuChungLichHenController::class, 'index'])->name('symptom');
Route::post('/admin/add_symptom', [TrieuChungLichHenController::class, 'add_symptom']);
Route::post('/admin/edit_symptom', [TrieuChungLichHenController::class, 'edit_symptom']);
Route::post('/admin/delete_symptom', [TrieuChungLichHenController::class, 'delete_symptom']);

// Quốc tịch
Route::get('/admin/nationality', [QuocTichController::class, 'index'])->name('nationality');
Route::post('/admin/add_nationality', [QuocTichController::class, 'add_nationality']);
Route::post('/admin/edit_nationality', [QuocTichController::class, 'edit_nationality']);
Route::post('/admin/delete_nationality', [QuocTichController::class, 'delete_nationality']);
// Dân tộc
Route::get('/admin/nation', [DanTocController::class, 'index'])->name('nation');
Route::post('/admin/add_nation', [DanTocController::class, 'add_nation']);
Route::post('/admin/edit_nation', [DanTocController::class, 'edit_nation']);
Route::post('/admin/delete_nation', [DanTocController::class, 'delete_nation']);
// Nghề nghiệp
Route::get('/admin/job', [NgheNghiepController::class, 'index'])->name('job');
Route::post('/admin/add_job', [NgheNghiepController::class, 'add_job']);
Route::post('/admin/edit_job', [NgheNghiepController::class, 'edit_job']);
Route::post('/admin/delete_job', [NgheNghiepController::class, 'delete_job']);
// Thành phố
Route::get('/admin/city', [DiaChiController::class, 'city'])->name('city');
Route::post('/admin/add_city', [DiaChiController::class, 'add_city']);
Route::post('/admin/edit_city', [DiaChiController::class, 'edit_city']);
Route::post('/admin/delete_city', [DiaChiController::class, 'delete_city']);
// Huyện
Route::get('/admin/district', [DiaChiController::class, 'district'])->name('district');
Route::post('/admin/add_district', [DiaChiController::class, 'add_district']);
Route::post('/admin/edit_district', [DiaChiController::class, 'edit_district']);
Route::post('/admin/delete_district', [DiaChiController::class, 'delete_district']);
// Xã
Route::get('/admin/wards', [DiaChiController::class, 'wards'])->name('wards');
Route::post('/admin/add_wards', [DiaChiController::class, 'add_wards']);
Route::post('/admin/edit_wards', [DiaChiController::class, 'edit_wards']);
Route::post('/admin/delete_wards', [DiaChiController::class, 'delete_wards']);
Route::post('/admin/loadquanhuyen', [DiaChiController::class, 'loadquanhuyen']);
// Cách sử dụng
Route::get('/admin/using', [CSDController::class, 'index'])->name('using');
Route::post('/admin/add_using', [CSDController::class, 'add_using']);
Route::post('/admin/edit_using', [CSDController::class, 'edit_using']);
Route::post('/admin/delete_using', [CSDController::class, 'delete_using']);
// Đơn vị tính thuốc
Route::get('/admin/drug_unit', [DVTTController::class, 'index'])->name('drug_unit');
Route::post('/admin/add_drug_unit', [DVTTController::class, 'add_drug_unit']);
Route::post('/admin/edit_drug_unit', [DVTTController::class, 'edit_drug_unit']);
Route::post('/admin/delete_drug_unit', [DVTTController::class, 'delete_drug_unit']);
// Đối tượng
Route::get('/admin/object', [BHYTController::class, 'object'])->name('object');
Route::post('/admin/add_object', [BHYTController::class, 'add_object']);
Route::post('/admin/edit_object', [BHYTController::class, 'edit_object']);
Route::post('/admin/delete_object', [BHYTController::class, 'delete_object']);
// Quyền lợi
Route::get('/admin/interest', [BHYTController::class, 'interest'])->name('interest');
Route::post('/admin/add_interest', [BHYTController::class, 'add_interest']);
Route::post('/admin/edit_interest', [BHYTController::class, 'edit_interest']);
Route::post('/admin/delete_interest', [BHYTController::class, 'delete_interest']);
// Nơi cấp
Route::get('/admin/issued', [BHYTController::class, 'issued'])->name('issued');
Route::post('/admin/add_issued', [BHYTController::class, 'add_issued']);
Route::post('/admin/edit_issued', [BHYTController::class, 'edit_issued']);
Route::post('/admin/delete_issued', [BHYTController::class, 'delete_issued']);


// NHÂN VIÊN
Route::get('/admin/staff', [StaffController::class, 'index'])->name('staff');
Route::post('/admin/add_staff', [StaffController::class, 'add_staff']);
Route::post('/admin/edit_staff', [StaffController::class, 'edit_staff']);
// BỆNH NHÂN
Route::get('/admin/patient', [BenhNhanController::class, 'index'])->name('patient');
// THUỐC
Route::get('/admin/medicine', [ThuocController::class, 'index'])->name('medicine');

// DS THUỐC
Route::get('/admin/list_medicine', [ThuocController::class, 'dsthuoc'])->name('list_medicine');
Route::post('/admin/add_medicine', [ThuocController::class, 'add_medicine'])->name('add_medicine');
Route::post('/admin/edit_medicine', [ThuocController::class, 'edit_medicine'])->name('edit_medicine');
Route::post('/admin/delete_medicine', [ThuocController::class, 'delete_medicine'])->name('delete_medicine');

// PHÒNG
Route::get('/admin/clinic', [PhongController::class, 'index'])->name('clinic');
Route::post('/admin/add_clinic', [PhongController::class, 'add_clinic'])->name('add_clinic');
Route::post('/admin/edit_clinic', [PhongController::class, 'edit_clinic']);
Route::post('/admin/delete_clinic', [PhongController::class, 'delete_clinic'])->name('delete_clinic');

Route::get('/admin/using_medicine', function () {
    return view('admin.ad_using_medicine');
});




// Route::get('/admin/health_index', function () {
//     return view('admin.ad_health_index');
// });
// Route::get('/admin/medical_examination_service', function () {
//     return view('admin.ad_medical_examination_service');
// });
// Route::get('/admin/dashboard', function () {
//     return view('admin.ad_dashboard');
// });
// Route::get('/admin/schedule', function () {
//     return view('admin.ad_schedule');
// });
// Route::get('/admin/schedule_details', function () {
//     return view('admin.ad_schedule_details');
// });

// --------------------------Wesite------------------------------

Route::get('/clinic/overview', function () {
    return view('website.ws_overview');
});

Route::get('/clinic/medical_specialty', function () {
    return view('website.ws_medical_specialty');
});
Route::get('/clinic', function () {
    return view('website.ws_index');
});
Route::get('/clinic/clinic_hours', function () {
    return view('website.ws_clinic_hours');
});

Route::get('/clinic/quitrinhkham', function () {
    return view('website.ws_quitrinhkham');
});

//medical_register Đăng ký khám bệnh
Route::get('/clinic/medical_register', [DKKhamBenhController::class, 'medical_register'])->name('medical_register');
Route::post('/clinic/add_medical_register', [DKKhamBenhController::class, 'add_medical_register']);
Route::post('/clinic/login_patient', [DKKhamBenhController::class, 'dangnhap']);
Route::get('/clinic/logout_patient', [DKKhamBenhController::class, 'logoutbn']);
Route::get('/clinic/profile_patient', [DKKhamBenhController::class, 'thongtinbn']);
Route::post('/clinic/loadquanhuyen', [DKKhamBenhController::class, 'loadquanhuyen']);
Route::post('/clinic/loadthixa', [DKKhamBenhController::class, 'loadthixa']);
Route::post('/clinic/lichsukham', [DKKhamBenhController::class, 'lichsukham']);
Route::post('/clinic/register_for_re_examination', [DKKhamBenhController::class, 'register_for_re_examination']);
//medical_register Đăng ký khám bệnh

//--------------------------Nhân Viên------------------------------------------

Route::get('/staff/index', [DangNhapNVController::class, 'thumucgoc']);
Route::get('/staff/st_login', [DangNhapNVController::class, 'index']);
Route::get('/staff/st_logout', [DangNhapNVController::class, 'nv_logout']);
Route::post('/staff/logging_in', [DangNhapNVController::class, 'login']);
Route::get('staff/phieuchidinh/{id}', [KhamBenhController::class, 'phieuchidinh']);


Route::middleware('IsPhongTiepNhan')->group(function () {
    // Giao diện
    Route::get('/staff/receive', [DSDatLichController::class, 'index'])->name('receive');
    Route::get('/staff/dstiepnhan', [DSDatLichController::class, 'dstiepnhan'])->name('dstiepnhan');
    Route::get('/staff/dsdatlichhen', [DSDatLichController::class, 'dsdatlichhen'])->name('dsdatlichhen');
    Route::get('/staff/dsbenhnhan', [DSDatLichController::class, 'dsbenhnhan'])->name('dsbenhnhan');

    Route::post('/staff/loadquanhuyen', [DSDatLichController::class, 'loadquanhuyen']);
    Route::post('/staff/loadthixa', [DSDatLichController::class, 'loadthixa']);
    Route::post('/staff/create_medical_records', [DSDatLichController::class, 'create_medical_records']);
    Route::post('/staff/re_create_medical_records', [DSDatLichController::class, 're_create_medical_records']);
    Route::post('/staff/confirmation_receive', [DSDatLichController::class, 'confirmation_receive']);
    Route::post('/staff/delete_receive', [DSDatLichController::class, 'delete_receive']);
    Route::post('/staff/list_receive', [DSDatLichController::class, 'list_receive']);
    // In phiếu khám bệnh
});
Route::get('/staff/print_medical_bill/{id}', [DSDatLichController::class, 'print_medical_bill']);
Route::middleware('IsPhongKhamBenh')->group(function () {
    // Bác sĩ
    Route::get('staff/medical_examination', [KhamBenhController::class, 'index']);
    Route::get('staff/medical_exam/{id}', [KhamBenhController::class, 'thongtinbn']);
    Route::post('staff/bocthuoc', [KhamBenhController::class, 'bocthuoc']);
    Route::post('staff/editthuoc', [KhamBenhController::class, 'editthuoc']);
    Route::post('staff/deletethuoc', [KhamBenhController::class, 'deletethuoc']);
    Route::post('staff/chiso', [KhamBenhController::class, 'chiso']);
    Route::post('staff/donthuoc', [KhamBenhController::class, 'donthuoc']);
    Route::get('staff/toathuoc/{id}', [KhamBenhController::class, 'toathuoc']);
    Route::post('staff/hoanthanhdonthuoc', [KhamBenhController::class, 'hoanthanhdonthuoc']);
    Route::post('staff/chidinhcls', [KhamBenhController::class, 'chidinhcls']);
});
Route::middleware('IsPhongThuNgan')->group(function () {
    // Thu Ngân
    Route::get('/staff/cashier', [ThuNganController::class, 'index']);
    Route::post('/staff/confirm_pkb', [ThuNganController::class, 'confirm_pkb']);
    Route::get('/staff/cashiercls', [ThuNganController::class, 'cls']);
    Route::post('/staff/confirm_cls', [ThuNganController::class, 'confirm_cls']);
});

Route::middleware('IsPhongChiDinh')->group(function () {
    //Chỉ định cận lâm sàng Xét nghiệm Siêu âm
    Route::get('staff/subclinical_examination', [PhieuChiDinhController::class, 'index']);
    Route::get('staff/subclinical_exam/sa/{pcd}/{cls}', [PhieuChiDinhController::class, 'sieuam']);
    Route::get('staff/subclinical_exam/xn/{pcd}/{cls}', [PhieuChiDinhController::class, 'xetnghiem']);
    Route::get('staff/subclinical_exam/ns/{pcd}/{cls}', [PhieuChiDinhController::class, 'noisoi']);
    Route::post('staff/subclinical_exam/text_results', [PhieuChiDinhController::class, 'text_results']);
    Route::post('staff/subclinical_exam/kq_sieuam', [PhieuChiDinhController::class, 'kq_sieuam']);
    Route::post('staff/subclinical_exam/kq_noisoi', [PhieuChiDinhController::class, 'kq_noisoi']);
});
Route::get('staff/inphieusieuam/{pcd}/{cls}', [PhieuChiDinhController::class, 'inphieusieuam']);
Route::get('staff/inphieunoisoi/{pcd}/{cls}', [PhieuChiDinhController::class, 'inphieunoisoi']);
Route::get('staff/inphieuxetnghiem/{pcd}/{cls}', [PhieuChiDinhController::class, 'inphieuxetnghiem']);
Route::get('staff/hoadonthuoc/{pkb}', [PhatthuocController::class, 'hoadonthuoc']);
//Phát thuốc    
Route::middleware('IsPhongPhatThuoc')->group(function () {
    Route::get('/staff/medicine_supply', [PhatThuocController::class, 'index']);
    Route::post('/staff/thanhtoanthuoc', [PhatThuocController::class, 'thanhtoanthuoc']);
});
