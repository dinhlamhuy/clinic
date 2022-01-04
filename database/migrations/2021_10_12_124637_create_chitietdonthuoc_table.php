<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChitietdonthuocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietdonthuoc', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedInteger('dthuoc_ma');
            $table->unsignedInteger('t_ma');
            $table->unsignedInteger('lnt_ma');
            $table->string('ctdt_lieudung',255)->nullable();
            $table->integer('ctdt_giaban');
            $table->integer('ctdt_soluong');
            $table->timestamps();
            
            $table->primary(['dthuoc_ma','t_ma','lnt_ma']);
            $table->foreign('dthuoc_ma')->references('dthuoc_ma')->on('donthuoc')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('t_ma')->references('t_ma')->on('thuoc')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('lnt_ma')->references('lnt_ma')->on('lonhapthuoc')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chitietdonthuoc');
    }
}
