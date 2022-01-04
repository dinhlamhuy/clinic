<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChitietlichhenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietlichhen', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            // $table->increments('ctlh_ma');
            $table->unsignedInteger('tclh_ma');
            $table->unsignedInteger('lh_ma');
            $table->timestamps();
            $table->primary(['tclh_ma','lh_ma']);

            $table->foreign('tclh_ma')->references('tclh_ma')->on('trieuchunglichhen')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('lh_ma')->references('lh_ma')->on('lichhen')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chitietlichhen');
    }
}
