<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class phongkham extends Seeder
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
            'pk_ma'    => '1',
            'pk_ten'    => 'Phòng tiếp tân',
          
        ];

        $list[]=
        [
            'pk_ma'    => '2',
            'pk_ten'    => 'Phòng thu ngân',
          
        ];

        $list[]=
        [
            'pk_ma'    => '3',
            'pk_ten'    => 'Phòng phát thuốc',
          
        ];

        $list[]=
        [
            'pk_ma'    => '4',
            'pk_ten'    => 'Phòng khám tai_mũi_họng',
          
        ];
        $list[]=
        [
            'pk_ma'    => '5',
            'pk_ten'    => 'Phòng khám mắt',
           
        ];
        $list[]=
        [
            'pk_ma'    => '6',
            'pk_ten'    => 'Phòng khám da liễu',
           
        ];
        $list[]=
        [
            'pk_ma'    => '7',
            'pk_ten'    => 'Phòng siêu âm',
           
        ];
        $list[]=
        [
            'pk_ma'    => '8',
            'pk_ten'    => 'Phòng xét nghiệm',
           
        ];
        DB::table('phongkham')->insert($list);
    }
}
