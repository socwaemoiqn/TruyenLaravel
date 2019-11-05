<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTruyenNhomDichesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_truyen_nhom_dich', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('truyen_id');
            $table->integer('nhom_dich_id');
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
        Schema::dropIfExists('truyen_nhom_diches');
    }
}
