<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTruyenChuongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_truyen_chuong', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('truyen_id');
            $table->integer('nhom_dich_thanh_vien_id');
            $table->integer('thu_tu_chuong');
            $table->string('ten_chuong');
            $table->text('noi_dung');
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
        Schema::dropIfExists('truyen_chuongs');
    }
}
