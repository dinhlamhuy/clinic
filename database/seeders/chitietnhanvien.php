<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class chitietnhanvien extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        
        $list[]=
        [
            'nv_ma'    => '1',
            'cv_ma'    => '1',
            'ngaybatdau'    => date('Y-m-d'),
            'ngayketthuc'    => NULL
            
        ];
        $list[]=
        [
            'nv_ma'    => '2',
            'cv_ma'    => '2',
            'ngaybatdau'    => date('Y-m-d'),
            'ngayketthuc'    => NULL
            
        ];
        $list[]=
        [
            'nv_ma'    => '3',
            'cv_ma'    => '5',
            'ngaybatdau'    => date('Y-m-d'),
            'ngayketthuc'    => NULL
            
        ];
        $list[]=
        [
            'nv_ma'    => '4',
            'cv_ma'    => '4',
            'ngaybatdau'    => date('Y-m-d'),
            'ngayketthuc'    => NULL
            
        ];
        $list[]=
        [
            'nv_ma'    => '5',
            'cv_ma'    => '4',
            'ngaybatdau'    => date('Y-m-d'),
            'ngayketthuc'    => NULL
            
        ];
        $list[]=
        [
            'nv_ma'    => '6',
            'cv_ma'    => '4',
            'ngaybatdau'    => date('Y-m-d'),
            'ngayketthuc'    => NULL
            
        ];
        $list[]=
        [
            'nv_ma'    => '7',
            'cv_ma'    => '4',
            'ngaybatdau'    => date('Y-m-d'),
            'ngayketthuc'    => NULL
            
        ];
        $list[]=
        [
            'nv_ma'    => '8',
            'cv_ma'    => '4',
            'ngaybatdau'    => date('Y-m-d'),
            'ngayketthuc'    => NULL
            
        ];
        $list[]=
        [
            'nv_ma'    => '9',
            'cv_ma'    => '4',
            'ngaybatdau'    => date('Y-m-d'),
            'ngayketthuc'    => NULL
            
        ];

        $list[]=
        [
            'nv_ma'    => '10',
            'cv_ma'    => '4',
            'ngaybatdau'    => date('Y-m-d'),
            'ngayketthuc'    => NULL
            
        ];
        DB::table('chitietnhanvien')->insert($list);
    }
}
