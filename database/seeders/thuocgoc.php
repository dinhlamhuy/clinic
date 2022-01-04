<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class thuocgoc extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $list = [];
        // Nhóm thuốc gây tê, gây mê, thuốc giãn cơ, giải giãn cơ
        $list[]=
        [
            'tg_ma'    => '1',
            'tg_ten'    => 'Atropin sulfat'
        ];
        $list[]=
        [
            'tg_ma'    => '2',
            'tg_ten'    => 'Bupivacain hydroclorid'
        ];
        $list[]=
        [
            'tg_ma'    => '3',
            'tg_ten'    => 'Lidocain hydroclodric'
        ];
        $list[]=
        [
            'tg_ma'    => '4',
            'tg_ten'    => 'Midazolam'
        ];
        $list[]=
        [
            'tg_ma'    => '5',
            'tg_ten'    => 'Propofol'
        ];
        // Nhóm thuốc giảm đau, hạ sốt chống viêm
        $list[]=
        [
            'tg_ma'    => '6',
            'tg_ten'    => 'Aescin'
        ];
        $list[]=
        [
            'tg_ma'    => '7',
            'tg_ten'    => 'Celecoxib'
        ];
        $list[]=
        [
            'tg_ma'    => '8',
            'tg_ten'    => 'Diclifenac'
        ];
        $list[]=
        [
            'tg_ma'    => '9',
            'tg_ten'    => 'Fentanyl'
        ];
        $list[]=
        [
            'tg_ma'    => '10',
            'tg_ten'    => 'Ketorolac'
        ];
        $list[]=
        [
            'tg_ma'    => '11',
            'tg_ten'    => 'Paracetamol'
        ];
        $list[]=
        [
            'tg_ma'    => '12',
            'tg_ten'    => 'Paracetamol + codein phosphat'
        ];
        $list[]=
        [
            'tg_ma'    => '13',
            'tg_ten'    => 'Paracetamol + tramadol'
        ];
        // Thuốc khác
        $list[]=
        [
            'tg_ma'    => '14',
            'tg_ten'    => 'Alendronat'
        ];
        $list[]=
        [
            'tg_ma'    => '15',
            'tg_ten'    => 'Alpha chymotrypsin'
        ];
        $list[]=
        [
            'tg_ma'    => '16',
            'tg_ten'    => 'Leflunomid'
        ];
        
        // Thuốc chống dị ứng và dùng trong các trường hợp quá mẫn cảm
        $list[]=
        [
            'tg_ma'    => '17',
            'tg_ten'    => 'Cinnarizin'
        ];
        $list[]=
        [
            'tg_ma'    => '18',
            'tg_ten'    => 'Chlorpheniramin'
        ];
        $list[]=
        [
            'tg_ma'    => '19',
            'tg_ten'    => 'Ebastin'
        ];
        $list[]=
        [
            'tg_ma'    => '20',
            'tg_ten'    => 'Promethazin hydroclorid'
        ];
        // Thuốc điều trị sốt rét
        $list[]=
        [
            'tg_ma'    => '21',
            'tg_ten'    => 'Artesunat'
        ];
        $list[]=
        [
            'tg_ma'    => '22',
            'tg_ten'    => 'Cloroquin'
        ];
        $list[]=
        [
            'tg_ma'    => '23',
            'tg_ten'    => 'Piperaquin + dihydrartemisinin'
        ];
        // Thuốc điều trị tim mạch
        $list[]=
        [
            'tg_ma'    => '24',
            'tg_ten'    => 'Glyceryl trinitrat'
        ];
        $list[]=
        [
            'tg_ma'    => '25',
            'tg_ten'    => 'Isosorbid'
        ];
        $list[]=
        [
            'tg_ma'    => '26',
            'tg_ten'    => 'Nicorandil'
        ];
        // Thuốc điều trị da liễu
        $list[]=
        [
            'tg_ma'    => '27',
            'tg_ten'    => 'Calcipotriol'
        ];
        $list[]=
        [
            'tg_ma'    => '28',
            'tg_ten'    => 'Calcipotriol + betamethason dipropionat'
        ];
        $list[]=
        [
            'tg_ma'    => '29',
            'tg_ten'    => 'Clobetasol butyrat'
        ];
        // Chuyên mắt
        $list[]=
        [
            'tg_ma'    => '30',
            'tg_ten'    => 'Fluorescein'
        ];
        // Thuốc đường tiêu hóa
        $list[]=
        [
            'tg_ma'    => '31',
            'tg_ten'    => 'Bismuth'
        ];
        $list[]=
        [
            'tg_ma'    => '32',
            'tg_ten'    => 'Rabeprazol'
        ];
        // Mắt
        $list[]=
        [
            'tg_ma'    => '33',
            'tg_ten'    => 'Carbomer'
        ];
        $list[]=
        [
            'tg_ma'    => '34',
            'tg_ten'    => 'Brinzolamid'
        ];
        // Tai mũi họng
        $list[]=
        [
            'tg_ma'    => '35',
            'tg_ten'    => 'Betahistin'
        ];
        $list[]=
        [
            'tg_ma'    => '36',
            'tg_ten'    => 'Rifamycin'
        ];
        $list[]=
        [
            'tg_ma'    => '37',
            'tg_ten'    => 'Xylometazonlin'
        ];
        // thêm
        $list[]=
        [
            'tg_ma'    => '38',
            'tg_ten'    => 'Morphin'
        ];
        $list[]=[
            'tg_ma'    => '39',
            'tg_ten'    => 'Meloxicam'
        ];
        DB::table('thuocgoc')->insert($list);
        
    }
}
