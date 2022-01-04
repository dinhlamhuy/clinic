<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhieukhambenhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieukhambenh', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('pkb_ma');
            $table->unsignedInteger('pkb_sttkham');
            $table->unsignedInteger('bn_ma');
            $table->unsignedInteger('lhk_ma');
            $table->unsignedInteger('p_ma');
            $table->unsignedInteger('ttk_ma');
            
           
            $table->timestamps();

            $table->foreign('bn_ma')->references('bn_ma')->on('benhnhan')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('lhk_ma')->references('lhk_ma')->on('loaihinhkham')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('ttk_ma')->references('ttk_ma')->on('trangthaikham')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('p_ma')->references('p_ma')->on('phong')->onDelete('CASCADE')->onUpdate('CASCADE');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phieukhambenh');
    }
}
