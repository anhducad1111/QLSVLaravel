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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            
            
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('typeuser')->nullable()->default('teacher');
            $table->integer('svID')->unsigned()->nullable();

           
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('svID')->references('id')->on('sinhvien');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
