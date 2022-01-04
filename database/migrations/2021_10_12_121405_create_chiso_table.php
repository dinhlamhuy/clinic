<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChisoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chiso', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('cs_ma');
            $table->string('cs_ten',50);
            $table->string('cs_tukhoa',50);
            $table->string('cs_dvt',50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chiso');
    }
}
