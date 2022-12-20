<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giangvien', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tengv');
            $table->date('ngaysinh');
            $table->string('gioitinh');
            $table->string('sodienthoai');
            $table->string('email');
            $table->string('chucdanh');
            $table->string('avatar')->nullable();
            $table->integer('khoa_id')->unsigned();
            $table->foreign('khoa_id')->references('id')->on('khoa');
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
        Schema::dropIfExists('giangvien');
    }
};
