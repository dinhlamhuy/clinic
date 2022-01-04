<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class nhacungcap extends Seeder
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
            'ncc_ma'    => '1',
            'ncc_ten'    => 'Công Ty TNHH An Nhiên Cửu Long',
            'ncc_sdt'    => '094949468',
            'ncc_email'    => 'annhiencuulong@gmail.com',
            'ncc_diachi'    => '15a, Khu Vực Thạnh Mỹ, P. Thường Thạnh, Q. Cái răng, TP. Cần Thơ'
        ];
        $list[]=
        [
            'ncc_ma'    => '2',
            'ncc_ten'    => 'Công Ty Cổ Phần Neemtree',
            'ncc_sdt'    => '0287106686',
            'ncc_email'    => 'info@neemtree.vn',
            'ncc_diachi'    => '37/5B Trung Mỹ Tây, Trung Chánh, Hóc Môn, Tp. Hồ Chí Minh (TPHCM)'
        ];
        $list[]=
        [
            'ncc_ma'    => '3',
            'ncc_ten'    => 'Công Ty Cổ Phần Difoco',
            'ncc_sdt'    => '0286685778',
            'ncc_email'    => 'info@difoco.com',
            'ncc_diachi'    => '289 Đinh Bộ Lĩnh, P. 26, Q. Bình Thạnh, Tp. Hồ Chí Minh (TPHCM)'
        ];
        DB::table('nhacungcap')->insert($list);

    }
}
