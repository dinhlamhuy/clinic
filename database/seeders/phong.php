<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class phong extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];

        $list[] =
            [
                'p_ma'    => '1',
                'p_ten'    => 'Phòng tiếp tân',

            ];

        $list[] =
            [
                'p_ma'    => '2',
                'p_ten'    => 'Phòng thu ngân',

            ];

        $list[] =
            [
                'p_ma'    => '3',
                'p_ten'    => 'Phòng phát thuốc',

            ];
        $list[] =
            [
                'p_ma'    => '4',
                'p_ten'    => 'Phòng khám bệnh',

            ];
        $list[] =
            [
                'p_ma'    => '5',
                'p_ten'    => 'Phòng tai-mũi-họng',

            ];
        $list[] =
            [
                'p_ma'    => '6',
                'p_ten'    => 'Phòng mắt',

            ];
        $list[] =
            [
                'p_ma'    => '7',
                'p_ten'    => 'Phòng da liễu',

            ];
        $list[] =
            [
                'p_ma'    => '8',
                'p_ten'    => 'Phòng siêu âm',

            ];
        $list[] =
            [
                'p_ma'    => '9',
                'p_ten'    => 'Phòng xét nghiệm',

            ];

        $list[] =
            [
                'p_ma'    => '10',
                'p_ten'    => 'Phòng nội soi',

            ];
        DB::table('phong')->insert($list);
    }
}
