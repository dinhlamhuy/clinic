<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChitiettrieuchungTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitiettrieuchung', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedInteger('b_ma');
            $table->unsignedInteger('tcb_ma');
            $table->timestamps();
            
            $table->primary(['b_ma','tcb_ma']);
            $table->foreign('b_ma')->references('b_ma')->on('benh')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('tcb_ma')->references('tcb_ma')->on('trieuchungbenh')->onDelete('CASCADE')->onUpdate('CASCADE');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chitiettrieuchung');
    }
}
