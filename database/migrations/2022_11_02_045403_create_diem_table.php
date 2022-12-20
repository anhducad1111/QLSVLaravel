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
        Schema::create('diem', function (Blueprint $table) {
            $table->increments('id');
            $table->double('diemcc');
            $table->double('diemtx');
            $table->double('diemgk');
            $table->double('diemck');
            $table->double('diemtong')->nullable();
            $table->string('diemchu')->nullable();
            $table->integer('monhoc_id')->unsigned();
            $table->integer('sinhvien_id')->unsigned();
            $table->foreign('monhoc_id')->references('id')->on('monhoc');
            $table->foreign('sinhvien_id')->references('id')->on('sinhvien');
            $table->integer('hocky');
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
        Schema::dropIfExists('diem');
    }
};
