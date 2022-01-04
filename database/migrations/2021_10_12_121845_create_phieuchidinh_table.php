<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhieuchidinhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieuchidinh', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('pcd_ma');
            $table->string('pcd_ghichu',255)->nullable();
            $table->unsignedInteger('pkb_ma');
            // $table->unsignedInteger('p_ma');
            $table->integer('pcd_trangthai');
            $table->timestamps();

            $table->foreign('pkb_ma')->references('pkb_ma')->on('phieukhambenh')->onDelete('CASCADE')->onUpdate('CASCADE');
            // $table->foreign('p_ma')->references('p_ma')->on('phong')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phieuchidinh');
    }
}
