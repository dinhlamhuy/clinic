<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLichhenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lichhen', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('lh_ma');
            $table->date('lh_ngay');
            $table->unsignedInteger('ttlh_ma');
            $table->unsignedInteger('nv_ma')->nullable();
            $table->unsignedInteger('kg_ma');
            $table->unsignedInteger('bn_ma')->nullable();
            $table->unsignedInteger('dk_ma')->nullable();
            $table->timestamps();

            $table->foreign('ttlh_ma')->references('ttlh_ma')->on('trangthailichhen')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('nv_ma')->references('nv_ma')->on('nhanvien')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('kg_ma')->references('kg_ma')->on('khunggio')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('bn_ma')->references('bn_ma')->on('benhnhan')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('dk_ma')->references('dk_ma')->on('dangky')->onDelete('CASCADE')->onUpdate('CASCADE');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lichhen');
    }
}
