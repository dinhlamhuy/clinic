<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class nhanvien extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];

        // TIẾP TÂN
        $list[]=
        [
            'nv_ma'    => '1',
            'nv_ten'    => 'Trịnh Ngọc Gia Quân',

            'nv_tentaikhoan'    => 'nv001',
            // 'nv_hinhanh'    => '',
            'nv_matkhau'    => Hash::make('123456'),
            'nv_gioitinh'    => 'Nữ',
            'nv_ngaysinh'    => '1998-09-09',
            'nv_cmnd'    => '366250319',
            'nv_sdt'    => '0336644594',
            'nv_email'    => 'giaquan@gmail.com',
            'nv_diachi'    => 'Cần Thơ',
            'nv_trangthai'  =>  '1'
        ];

        // KẾ TOÁN
        $list[]=
        [
            'nv_ma'    => '2',
            'nv_ten'    => 'Hà Như Quỳnh',
          
            'nv_tentaikhoan'    => 'nv002',
            // 'nv_hinhanh'    => '',
            'nv_matkhau'    => Hash::make('123456'),
            'nv_gioitinh'    => 'Nữ',
            'nv_ngaysinh'    => '1998-09-09',
            'nv_cmnd'    => '366250319',
            'nv_sdt'    => '0336644594',
            'nv_email'    => 'hanhuquynh@gmail.com',
            'nv_diachi'    => 'Cần Thơ',
            'nv_trangthai'  =>  '1'
        ];
        
        // y tá
        $list[]=
        [
            'nv_ma'    => '3',
            'nv_ten'    => 'Huỳnh Kim Phương Ngân',
            'nv_tentaikhoan'    => 'nv003',
            // 'nv_hinhanh'    => '',
            'nv_matkhau'    => Hash::make('123456'),
            'nv_gioitinh'    => 'Nữ',
            'nv_ngaysinh'    => '1998-09-09',
            'nv_cmnd'    => '366250319',
            'nv_sdt'    => '0336644594',
            'nv_email'    => 'huynhkimphuongngan@gmail.com',
            'nv_diachi'    => 'Cần Thơ',
            'nv_trangthai'  =>  '1'
        ];
        
        // Bác sĩ phòng khám bệnh
        $list[]=
        [
            'nv_ma'    => '4',
            'nv_ten'    => 'Đinh Lâm Huy',
            'nv_tentaikhoan'    => 'nv004',
            // 'nv_hinhanh'    => '',
            'nv_matkhau'    => Hash::make('123456'),
            'nv_gioitinh'    => 'Nam',
            'nv_ngaysinh'    => '1998-09-09',
            'nv_cmnd'    => '366250319',
            'nv_sdt'    => '0336644594',
            'nv_email'    => 'dinhlamhuy@gmail.com',
            'nv_diachi'    => 'Cần Thơ',
            'nv_trangthai'  =>  '1'
        ];

        // Bác sĩ phòng tai mũi họng
        $list[]=
        [
            'nv_ma'    => '5',
            'nv_ten'    => 'Nguyễn Văn Xuyên',
            'nv_tentaikhoan'    => 'nv005',
            // 'nv_hinhanh'    => '',
            'nv_matkhau'    => Hash::make('123456'),
            'nv_gioitinh'    => 'Nam',
            'nv_ngaysinh'    => '1998-09-09',
            'nv_cmnd'    => '366250319',
            'nv_sdt'    => '0336644594',
            'nv_email'    =>'nguyenvanxuyen@gmail.com',
            'nv_diachi'    => 'Cần Thơ',
            'nv_trangthai'  =>  '1'
        ];

        // Bác sĩ phòng mắt
        $list[]=
        [
            'nv_ma'    => '6',
            'nv_ten'    => 'Nguyễn Tú Trinh',
            'nv_tentaikhoan'    => 'nv006',
            // 'nv_hinhanh'    => '',
            'nv_matkhau'    => Hash::make('123456'),
            'nv_gioitinh'    => 'Nữ',
            'nv_ngaysinh'    => '1998-09-09',
            'nv_cmnd'    => '366250319',
            'nv_sdt'    => '0336644594',
            'nv_email'    => 'nguyentutrinh@gmail.com',
            'nv_diachi'    => 'Cần Thơ',
            'nv_trangthai'  =>  '1'
        ];

        // Bác sĩ phòng da liễu
        $list[]=
        [
            'nv_ma'    => '7',
            'nv_ten'    => 'Nguyễn Thị Linh Phi',
            'nv_tentaikhoan'    => 'nv007',
            // 'nv_hinhanh'    => '',
            'nv_matkhau'    => Hash::make('123456'),
            'nv_gioitinh'    => 'Nữ',
            'nv_ngaysinh'    => '1998-09-09',
            'nv_cmnd'    => '366250319',
            'nv_sdt'    => '0336644594',
            'nv_email'    => 'nguyenthilinhphi@gmail.com',
            'nv_diachi'    => 'Cần Thơ',
            'nv_trangthai'  =>  '1'
        ];

        // Bác sĩ phòng siêu âm
        $list[]=
        [
            'nv_ma'    => '8',
            'nv_ten'    => 'Lê Ngọc Linh',
            'nv_tentaikhoan'    => 'nv008',
            // 'nv_hinhanh'    => '',
            'nv_matkhau'    => Hash::make('123456'),
            'nv_gioitinh'    => 'Nữ',
            'nv_ngaysinh'    => '1998-09-09',
            'nv_cmnd'    => '366250319',
            'nv_sdt'    => '0336644594',
            'nv_email'    => 'lengoclinh@gmail.com',
            'nv_diachi'    => 'Cần Thơ',
            'nv_trangthai'  =>  '1'
        ];

        // Bác sĩ phòng xét nghiệm
        $list[]=
        [
            'nv_ma'    => '9',
            'nv_ten'    => 'Nguyễn Chí Thiện',
            'nv_tentaikhoan'    => 'nv009',
            // 'nv_hinhanh'    => '',
            'nv_matkhau'    => Hash::make('123456'),
            'nv_gioitinh'    => 'Nữ',
            'nv_ngaysinh'    => '1998-09-09',
            'nv_cmnd'    => '366250319',
            'nv_sdt'    => '0336644594',
            'nv_email'    => 'nguyenchithien@gmail.com',
            'nv_diachi'    => 'Cần Thơ',
            'nv_trangthai'  =>  '1'
        ];

        // Bác sĩ phòng nội soi
        $list[]=
        [
            'nv_ma'    => '10',
            'nv_ten'    => 'Jang Kim Kook',
            'nv_tentaikhoan'    => 'nv010',
            // 'nv_hinhanh'    => '',
            'nv_matkhau'    => Hash::make('123456'),
            'nv_gioitinh'    => 'Nữ',
            'nv_ngaysinh'    => '1998-09-09',
            'nv_cmnd'    => '366250319',
            'nv_sdt'    => '0336644594',
            'nv_email'    => 'jangkimkook@gmail.com',
            'nv_diachi'    => 'Cần Thơ',
            'nv_trangthai'  =>  '1'
        ];
        DB::table('nhanvien')->insert($list);
    }
}
