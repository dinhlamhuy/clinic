<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class chitietlonhapthuoc extends Seeder
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
            'lnt_ma'    => '1',
            't_ma'    => '1',
            'dvtt_ma'    => '1',
            'ctlnt_gianhap'    => '2000',
            'ctlnt_soluongnhap'    => '1000',
            'ctlnt_soluong'    => '1000',
            'ctlnt_ngaysx'    => '2020-12-31',
            'ctlnt_hansudung'    => '2023-01-01'
            
        ];
        $list[]=
        [
            'lnt_ma'    => '1',
            't_ma'    => '2',
            'dvtt_ma'    => '5',
            'ctlnt_gianhap'    => '500',
            'ctlnt_soluongnhap'    => '1000',
            'ctlnt_soluong'    => '1000',
            'ctlnt_ngaysx'    => '2020-12-31',
            'ctlnt_hansudung'    => '2023-01-01'
            
        ];
        $list[]=
        [
            'lnt_ma'    => '1',
            't_ma'    => '3',
            'dvtt_ma'    => '2',
            'ctlnt_gianhap'    => '1200',
            'ctlnt_soluongnhap'    => '1000',
            'ctlnt_soluong'    => '1000',
            'ctlnt_ngaysx'    => '2020-12-31',
            'ctlnt_hansudung'    => '2023-01-01'
            
        ];
        $list[]=
        [
            'lnt_ma'    => '1',
            't_ma'    => '4',
            'dvtt_ma'    => '2',
            'ctlnt_gianhap'    => '2000',
            'ctlnt_soluongnhap'    => '1000',
            'ctlnt_soluong'    => '1000',
            'ctlnt_ngaysx'    => '2020-12-31',
            'ctlnt_hansudung'    => '2023-01-01'
            
        ];
        $list[]=
        [
            'lnt_ma'    => '1',
            't_ma'    => '6',
            'dvtt_ma'    => '1',
            'ctlnt_gianhap'    => '3000',
            'ctlnt_soluongnhap'    => '2000',
            'ctlnt_soluong'    => '2000',
            'ctlnt_ngaysx'    => '2020-12-31',
            'ctlnt_hansudung'    => '2023-01-01'
            
        ];
        $list[]=
        [
            'lnt_ma'    => '1',
            't_ma'    => '7',
            'dvtt_ma'    => '2',
            'ctlnt_gianhap'    => '500',
            'ctlnt_soluongnhap'    => '1500',
            'ctlnt_soluong'    => '1500',
            'ctlnt_ngaysx'    => '2020-12-31',
            'ctlnt_hansudung'    => '2023-01-01'
            
        ];
        $list[]=
        [
            'lnt_ma'    => '1',
            't_ma'    => '8',
            'dvtt_ma'    => '1',
            'ctlnt_gianhap'    => '18900',
            'ctlnt_soluongnhap'    => '1000',
            'ctlnt_soluong'    => '1000',
            'ctlnt_ngaysx'    => '2020-12-31',
            'ctlnt_hansudung'    => '2023-01-01'
            
        ];
        $list[]=
        [
            'lnt_ma'    => '1',
            't_ma'    => '9',
            'dvtt_ma'    => '1',
            'ctlnt_gianhap'    => '2300',
            'ctlnt_soluongnhap'    => '800',
            'ctlnt_soluong'    => '800',
            'ctlnt_ngaysx'    => '2020-12-31',
            'ctlnt_hansudung'    => '2023-01-01'
            
        ];
        $list[]=
        [
            'lnt_ma'    => '1',
            't_ma'    => '10',
            'dvtt_ma'    => '7',
            'ctlnt_gianhap'    => '2400',
            'ctlnt_soluongnhap'    => '800',
            'ctlnt_soluong'    => '800',
            'ctlnt_ngaysx'    => '2020-12-31',
            'ctlnt_hansudung'    => '2023-01-01'
            
        ];
        DB::table('chitietlonhap')->insert($list);

    }
}
