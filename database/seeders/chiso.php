<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class chiso extends Seeder
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
            'cs_ma'    => '1',
            'cs_ten'    => 'Huyết áp',
            'cs_tukhoa' =>  'huyetap',
            'cs_dvt' => 'mmHg'
        ];
        $list[]=
        [
            'cs_ma'    => '2',
            'cs_ten'    => 'Nhịp tim',
            'cs_tukhoa' =>  'nhiptim',
            'cs_dvt' => 'nhịp/phút'
        ];
        $list[]=
        [
            'cs_ma'    => '3',
            'cs_ten'    => 'Cân nặng',
            'cs_tukhoa' =>  'cannang',
            'cs_dvt' => 'kg'
        ];
        
        $list[]=
        [
            'cs_ma'    => '4',
            'cs_ten'    => 'Nhiệt độ',
            'cs_tukhoa' =>  'nhietdo',
            'cs_dvt' => 'độ C'
        ];
        $list[]=
        [
            'cs_ma'    => '5',
            'cs_ten'    => 'Chiều cao',
            'cs_tukhoa' =>  'chieucao',
            'cs_dvt' => 'cm'
        ];
        $list[]=
        [
            'cs_ma'    => '6',
            'cs_ten'    => 'Nhóm máu',
            'cs_tukhoa' =>  'nhommau',
            'cs_dvt' => ''
        ];
        
       
        DB::table('chiso')->insert($list);
    }
}
