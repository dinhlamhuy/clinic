<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCanlamsangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('canlamsang', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('cls_ma');
            $table->unsignedInteger('ncls_ma');
            $table->string('cls_ten',100);
            $table->longText('cls_form')->nullable();
            $table->integer('cls_giabhyt');
            $table->integer('cls_giadv');
            $table->integer('cls_tienchenhlech');
            $table->timestamps();

            $table->foreign('ncls_ma')->references('ncls_ma')->on('nhomcanlamsang')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('canlamsang');
    }
}
