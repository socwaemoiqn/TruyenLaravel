<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNhomDichThanhViensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_nhom_dich_thanh_vien', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tai_khoan_id');
            $table->integer('nhom_dich_id');
            $table->integer('nhom_dich_vai_tro_id');
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
        Schema::dropIfExists('nhom_dich_thanh_viens');
    }
}
