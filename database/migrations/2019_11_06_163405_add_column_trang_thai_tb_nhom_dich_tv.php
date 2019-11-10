<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnTrangThaiTbNhomDichTv extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_nhom_dich_thanh_vien', function (Blueprint $table) {
            $table->integer('trang_thai');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_nhom_dich_thanh_vien', function (Blueprint $table) {
            //
        });
    }
}
