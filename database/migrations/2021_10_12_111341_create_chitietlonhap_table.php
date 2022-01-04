<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChitietlonhapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietlonhap', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedInteger('lnt_ma');
            $table->unsignedInteger('t_ma');
            $table->unsignedInteger('dvtt_ma');
            $table->integer('ctlnt_gianhap');
            $table->integer('ctlnt_slchua')->nullable();
            $table->string('ctlnt_dvtchua')->nullable();
            $table->integer('ctlnt_soluong');
            $table->integer('ctlnt_soluongnhap');
            $table->date('ctlnt_ngaysx');
            $table->date('ctlnt_hansudung');
            $table->timestamps();
            $table->primary(['lnt_ma','t_ma']);
            $table->foreign('t_ma')->references('t_ma')->on('thuoc')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('lnt_ma')->references('lnt_ma')->on('lonhapthuoc')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('dvtt_ma')->references('dvtt_ma')->on('donvitinhthuoc')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chitietlonhap');
    }
}
