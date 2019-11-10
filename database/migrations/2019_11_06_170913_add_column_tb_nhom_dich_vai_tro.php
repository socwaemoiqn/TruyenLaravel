<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnTbNhomDichVaiTro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_nhom_dich_vai_tro', function (Blueprint $table) {
            $table->integer('trang_thai');
            $table->text('gioi_thieu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_nhom_dich_vai_tro', function (Blueprint $table) {
            //
        });
    }
}
