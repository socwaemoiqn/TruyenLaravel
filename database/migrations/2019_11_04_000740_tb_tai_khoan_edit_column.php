<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbTaiKhoanEditColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_tai_khoan', function (Blueprint $table) {
            $table->string('ten_tai_khoan')->nullable()->change();
            $table->string('mat_khau')->nullable()->change();
            $table->integer('ma_vai_tro')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_tai_khoan', function (Blueprint $table) {
            //
        });
    }
}
