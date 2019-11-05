<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhanHoisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_phan_hoi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ho_ten');
            $table->string('email');
            $table->string('chu_de');
            $table->text('noi_dung');
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
        Schema::dropIfExists('phan_hois');
    }
}
