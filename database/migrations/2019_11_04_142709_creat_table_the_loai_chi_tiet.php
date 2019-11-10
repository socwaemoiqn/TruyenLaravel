<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatTableTheLoaiChiTiet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_the_loai_chi_tiet', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('the_loai_id');
            $table->integer('truyen_id');
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
        Schema::dropIfExists('tb_the_loai_chi_tiet');
    }
}
