<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChitietchisoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietchiso', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('ctcs_chitiet',50)->nullable();
            $table->unsignedInteger('cs_ma');
            $table->unsignedInteger('pkb_ma');
            $table->timestamps();

            $table->primary(['pkb_ma','cs_ma']);
            $table->foreign('cs_ma')->references('cs_ma')->on('chiso')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('pkb_ma')->references('pkb_ma')->on('phieukhambenh')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chitietchiso');
    }
}