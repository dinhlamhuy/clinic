<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class chucvu extends Seeder
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
            'cv_ma'    => '1',
            'cv_ten'    => 'Tiếp tân'
        ];
        $list[]=
        [
            'cv_ma'    => '2',
            'cv_ten'    => 'Kế toán'
        ];
        
        $list[]=
        [
            'cv_ma'    => '3',
            'cv_ten'    => 'Y tá'
        ];
        $list[]=
        [
            'cv_ma'    => '4',
            'cv_ten'    => 'Bác sĩ'
        ];
        $list[]=
        [
            'cv_ma'    => '5',
            'cv_ten'    => 'Dược sĩ'
        ];
        DB::table('chucvu')->insert($list);
    }
}
