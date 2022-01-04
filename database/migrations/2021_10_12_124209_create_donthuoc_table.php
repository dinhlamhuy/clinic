<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonthuocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donthuoc', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('dthuoc_ma');
            $table->unsignedInteger('pkb_ma');
            $table->unsignedInteger('ldt_ma');
            $table->string('dthuoc_loidan',255)->nullable();
            $table->date('dthuoc_loihen')->nullable();
            $table->integer('dthuoc_trangthai');
            $table->timestamps();

            $table->foreign('pkb_ma')->references('pkb_ma')->on('phieukhambenh')->onDelete('CASCADE')->onUpdate('CASCADE');
            // $table->foreign('b_ma')->references('b_ma')->on('benh')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('ldt_ma')->references('ldt_ma')->on('loaidonthuoc')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donthuoc');
    }
}
