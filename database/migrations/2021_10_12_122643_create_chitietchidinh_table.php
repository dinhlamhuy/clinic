<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChitietchidinhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietchidinh', function (Blueprint $table) {
            $table->unsignedInteger('cls_ma');
            $table->unsignedInteger('pcd_ma');
            $table->unsignedInteger('p_ma');
            $table->longText('ctcd_ctthuchien')->nullable();
            $table->string('ctcd_ketquachidinh',255)->nullable();
            $table->integer('ctcd_giatien')->nullable();
            $table->timestamps();

            $table->primary(['pcd_ma','cls_ma']);
            $table->foreign('cls_ma')->references('cls_ma')->on('canlamsang')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('pcd_ma')->references('pcd_ma')->on('phieuchidinh')->onDelete('CASCADE')->onUpdate('CASCADE');
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
        Schema::dropIfExists('chitietchidinh');
    }
}
