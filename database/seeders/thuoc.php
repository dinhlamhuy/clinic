<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class thuoc extends Seeder
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
            't_ma'    => '1',
            'nt_ma'    => '8',
            'pl_ma'    => '1',
            'csd_ma'    => '4',
            'tg_ma'    => '1',
            't_ten'    => 'ATROPINE-BFS',
            't_hamluong'    => '0.25mg',
            't_lieudung'    => 'Sáng 1 viên - Chiều 1 viên',
            't_giabhyt'    => '2500',
            't_giadv'    => '3000',
            
        ];

        $list[]=
        [
            't_ma'    => '2',
            'nt_ma'    => '8',
            'pl_ma'    => '1',
            'csd_ma'    => '1',
            'tg_ma'    => '1',
            't_ten'    => 'Diazepam injection BP',
            't_hamluong'    => '10mg/2ml',
            't_lieudung'    => '',
            't_giabhyt'    => '700',
            't_giadv'    => '1000',
            
        ];

        $list[]=
        [
            't_ma'    => '3',
            'nt_ma'    => '8',
            'pl_ma'    => '1',
            'csd_ma'    => '1',
            'tg_ma'    => '3',
            't_ten'    => 'Lidocain kabi',
            't_hamluong'    => '2% 2ml',
            't_lieudung'    => '',
            't_giabhyt'    => '1450',
            't_giadv'    => '1700',
            
        ];

        $list[]=
        [
            't_ma'    => '4',
            'nt_ma'    => '8',
            'pl_ma'    => '1',
            'csd_ma'    => '1',
            'tg_ma'    => '3',
            't_ten'    => 'Lidocain kabi',
            't_hamluong'    => '2% 2ml',
            't_lieudung'    => '',
            't_giabhyt'    => '2200',
            't_giadv'    => '2500',
            
        ];
        $list[]=
        [
            't_ma'    => '5',
            'nt_ma'    => '8',
            'pl_ma'    => '1',
            'csd_ma'    => '1',
            'tg_ma'    => '3',
            't_ten'    => 'Lidocain',
            't_hamluong'    => '10% 38g',
            't_lieudung'    => 'Tối 1 viên',
            't_giabhyt'    => '5500',
            't_giadv'    => '6200',
            
        ];
        $list[]=
        [
            't_ma'    => '6',
            'nt_ma'    => '8',
            'pl_ma'    => '1',
            'csd_ma'    => '3',
            'tg_ma'    => '3',
            't_ten'    => 'Xydocain jelly',
            't_hamluong'    => '10% 38g',
            't_lieudung'    => 'Sáng 1 viên - Chiều 1 viên',
            't_giabhyt'    => '3400',
            't_giadv'    => '4000',
            
        ];

        $list[]=
        [
            't_ma'    => '7',
            'nt_ma'    => '1',
            'pl_ma'    => '1',
            'csd_ma'    => '1',
            'tg_ma'    => '6',
            't_ten'    => 'Sodiumronium kabi',
            't_hamluong'    => '10mg/ml 5ml',
            't_lieudung'    => '',
            't_giabhyt'    => '800',
            't_giadv'    => '1200',
            
        ];
        $list[]=
        [
            't_ma'    => '8',
            'nt_ma'    => '1',
            'pl_ma'    => '1',
            'csd_ma'    => '4',
            'tg_ma'    => '8',
            't_ten'    => 'Rocuronium Invagen',
            't_hamluong'    => '50mg/ml 5ml',
            't_lieudung'    => '',
            't_giabhyt'    => '20000',
            't_giadv'    => '22000',
            
        ];
        $list[]=
        [
            't_ma'    => '9',
            'nt_ma'    => '1',
            'pl_ma'    => '1',
            'csd_ma'    => '1',
            'tg_ma'    => '8',
            't_ten'    => 'Voltaren',
            't_hamluong'    => '75mg',
            't_lieudung'    => 'Sáng 1 viên - Chiều 1 viên',
            't_giabhyt'    => '2500',
            't_giadv'    => '3300',
            
        ];
        $list[]=
        [
            't_ma'    => '10',
            'nt_ma'    => '1',
            'pl_ma'    => '1',
            'csd_ma'    => '3',
            'tg_ma'    => '8',
            't_ten'    => 'Voltaren Emulgel',
            't_hamluong'    => '1% 20mg',
            't_lieudung'    => 'Trước ăn sáng 30p',
            't_giabhyt'    => '2500',
            't_giadv'    => '3000',
            
        ];
        $list[]=
        [
            't_ma'    => '11',
            'nt_ma'    => '1',
            'pl_ma'    => '1',
            'csd_ma'    => '4',
            'tg_ma'    => '10',
            't_ten'    => 'Algensin-N',
            't_hamluong'    => '30mg/1mg',
            't_lieudung'    => 'Sáng 1 viên - Chiều 1 viên',
            't_giabhyt'    => '4000',
            't_giadv'    => '4300',
            
        ];
        $list[]=
        [
            't_ma'    => '12',
            'nt_ma'    => '1',
            'pl_ma'    => '1',
            'csd_ma'    => '4',
            'tg_ma'    => '10',
            't_ten'    => 'Ketorolac A.T',
            't_hamluong'    => '30mg/2mg 2ml',
            't_lieudung'    => '',
            't_giabhyt'    => '19000',
            't_giadv'    => '20000',
            
        ];
        $list[]=
        [
            't_ma'    => '13',
            'nt_ma'    => '1',
            'pl_ma'    => '1',
            'csd_ma'    => '1',
            'tg_ma'    => '39',
            't_ten'    => 'Meloxicam',
            't_hamluong'    => '7.5mg',
            't_lieudung'    => 'Sáng viên - Chiều 1 viên',
            't_giabhyt'    => '2500',
            't_giadv'    => '3000',
            
        ];
        $list[]=
        [
            't_ma'    => '14',
            'nt_ma'    => '1',
            'pl_ma'    => '1',
            'csd_ma'    => '1',
            'tg_ma'    => '39',
            't_ten'    => 'Melocox',
            't_hamluong'    => '15mg',
            't_lieudung'    => 'Sáng 1 viên - Chiều 1 viên',
            't_giabhyt'    => '2500',
            't_giadv'    => '3000',
            
        ];
        $list[]=
        [
            't_ma'    => '15',
            'nt_ma'    => '1',
            'pl_ma'    => '1',
            'csd_ma'    => '1',
            'tg_ma'    => '38',
            't_ten'    => 'Morphin',
            't_hamluong'    => '30mg',
            't_lieudung'    => 'Sáng 1 viên - Chiều 1 viên',
            't_giabhyt'    => '170',
            't_giadv'    => '200',
            
        ];
        $list[]=
        [
            't_ma'    => '16',
            'nt_ma'    => '1',
            'pl_ma'    => '1',
            'csd_ma'    => '1',
            'tg_ma'    => '38',
            't_ten'    => 'MS contin',
            't_hamluong'    => '30mg',
            't_lieudung'    => 'Sáng 1 viên - Chiều 1 viên',
            't_giabhyt'    => '2100',
            't_giadv'    => '3000',
            
        ];
        $list[]=
        [
            't_ma'    => '17',
            'nt_ma'    => '1',
            'pl_ma'    => '1',
            'csd_ma'    => '4',
            'tg_ma'    => '11',
            't_ten'    => 'Paracetamol kabi',
            't_hamluong'    => '1g 100ml',
            't_lieudung'    => 'Sáng 1 viên - Chiều 1 viên',
            't_giabhyt'    => '1500',
            't_giadv'    => '2000',
            
        ];
        $list[]=
        [
            't_ma'    => '18',
            'nt_ma'    => '1',
            'pl_ma'    => '1',
            'csd_ma'    => '1',
            'tg_ma'    => '11',
            't_ten'    => 'Efferalgan',
            't_hamluong'    => '80mg',
            't_lieudung'    => 'Sáng 1 viên - Chiều 1 viên',
            't_giabhyt'    => '500',
            't_giadv'    => '1000',
            
        ];
        $list[]=
        [
            't_ma'    => '19',
            'nt_ma'    => '1',
            'pl_ma'    => '1',
            'csd_ma'    => '3',
            'tg_ma'    => '10',
            't_ten'    => 'Nizoral cream',
            't_hamluong'    => '2% 10g',
            't_lieudung'    => 'Sáng 1 viên - Chiều 1 viên',
            't_giabhyt'    => '3400',
            't_giadv'    => '3800',
            
        ];
        $list[]=
        [
            't_ma'    => '20',
            'nt_ma'    => '1',
            'pl_ma'    => '1',
            'csd_ma'    => '5',
            'tg_ma'    => '10',
            't_ten'    => 'Oflovid ophththailmic ointment',
            't_hamluong'    => '0.3% 3.5g',
            't_lieudung'    => 'Sáng 1 viên - Chiều 1 viên',
            't_giabhyt'    => '2500',
            't_giadv'    => '3000',
            
        ];
        DB::table('thuoc')->insert($list);

    }
}
