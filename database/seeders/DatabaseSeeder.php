<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(admin::class);
        $this->call(thanhpho::class);
        $this->call(huyen::class);
        $this->call(xa::class);
        $this->call(quoctich::class);
        $this->call(nghenghiep::class);
        $this->call(dantoc::class);
        $this->call(chucvu::class);
        $this->call(phong::class);
        $this->call(nhanvien::class);
        $this->call(chitietnhanvien::class);
        $this->call(trangthailichhen::class);
        $this->call(buoi::class);
        $this->call(khunggio::class);
        $this->call(trieuchunglichhen::class);
        $this->call(nhomcanlamsang::class);
        $this->call(canlamsang::class);
        $this->call(nhombenh::class);
        $this->call(benh::class);
        $this->call(trieuchungbenh::class);
        $this->call(chitiettrieuchung::class);
        $this->call(doituong::class);
        $this->call(quyenloi::class);
        $this->call(noicap::class);
        $this->call(loaihinhkham::class);
        $this->call(trangthaikham::class);
        $this->call(chiso::class);
        $this->call(cachsudung::class);
        $this->call(nhomthuoc::class);
        $this->call(donvitinhthuoc::class);
        $this->call(phanloai::class);
        $this->call(thuocgoc::class);
        $this->call(nhacungcap::class);
        // $this->call(thuoc::class);
        $this->call(loaidonthuoc::class);
        // $this->call(lonhapthuoc::class);
        // $this->call(chitietlonhapthuoc::class );
        $this->call(chitietnhanvienphong::class );

    }
}
