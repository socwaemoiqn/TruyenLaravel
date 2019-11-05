<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTacGiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_tac_gia', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten_tac_gia');
            $table->text('gioi_thieu')->nullable();
            $table->integer('trang_thai');
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
        Schema::dropIfExists('tac_gias');
    }
}
