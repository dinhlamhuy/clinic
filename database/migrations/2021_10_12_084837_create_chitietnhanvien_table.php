<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChitietnhanvienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietnhanvien', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            // $table->increments('ctnv_id');
            $table->unsignedInteger('nv_ma');
            $table->unsignedInteger('cv_ma');
            $table->date('ngaybatdau');
            $table->date('ngayketthuc')->nullable();
            $table->timestamps();

            $table->primary(['nv_ma', 'cv_ma']);
            $table->foreign('nv_ma')->references('nv_ma')->on('nhanvien')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('cv_ma')->references('cv_ma')->on('chucvu')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chitietnhanvien');
    }
}
