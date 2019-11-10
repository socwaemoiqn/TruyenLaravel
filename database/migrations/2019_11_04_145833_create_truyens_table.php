<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTruyensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_truyen', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tac_gia_id');
            $table->string('ten_truyen');
            $table->integer('so_chuong');
            $table->text('gioi_thieu')->nullable();
            $table->integer('luot_xem');
            $table->string('nguon')->nullable();
            $table->string('hinh_anh')->nullable();
            $table->integer('truyen_trang_thai_id');
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
        Schema::dropIfExists('truyens');
    }
}
