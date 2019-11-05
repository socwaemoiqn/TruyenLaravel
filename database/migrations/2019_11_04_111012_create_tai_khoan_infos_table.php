<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaiKhoanInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tai_khoan_info', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tai_khoan_id');
            $table->string('ho_ten',50)->nullable();
            $table->string('email',100)->nullable();
            $table->string('sdt',50)->nullable();
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
        Schema::dropIfExists('tai_khoan_infos');
    }
}
