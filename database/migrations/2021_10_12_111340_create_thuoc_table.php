<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThuocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thuoc', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('t_ma');
            $table->unsignedInteger('nt_ma');
            $table->unsignedInteger('pl_ma');
            $table->unsignedInteger('csd_ma');
            $table->unsignedInteger('tg_ma');
            $table->string('t_ten',100);
            $table->string('t_hamluong',100)->nullable();
            $table->string('t_lieudung',50)->nullable();
            $table->integer('t_giabhyt')->nullable();
            $table->integer('t_giadv')->nullable();
            // $table->string('t_hinhanh',255)->nullable();
            $table->timestamps();

            $table->foreign('nt_ma')->references('nt_ma')->on('nhomthuoc')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('pl_ma')->references('pl_ma')->on('phanloai')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('csd_ma')->references('csd_ma')->on('cachsudung')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('tg_ma')->references('tg_ma')->on('thuocgoc')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thuoc');
    }
}
